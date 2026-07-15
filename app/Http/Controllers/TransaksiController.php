<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use App\Models\KeranjangModel;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;
use App\Models\ProdukModel;
use App\Models\UserModel;

class TransaksiController extends Controller
{
    // CHECKOUT
    public function checkout(Request $request)
    {
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        $idUser = session('id_user');
        $user = UserModel::findOrFail($idUser);

        $keranjang = KeranjangModel::where('id_user', $idUser)
            ->with('produk')
            ->get();

        if ($keranjang->isEmpty()) {
            return response()->json([
                'message' => 'Keranjang masih kosong.'
            ], 400);
        }

        $totalQty = $keranjang->sum('jumlah');
        $totalHarga = $keranjang->sum('subtotal');
        $orderId = 'INV-' . now()->format('YmdHis') . '-' . rand(1000,9999);

        DB::beginTransaction();

        try {
            $transaksi = TransaksiModel::create([
                'order_id'        => $orderId,
                'id_user'         => $idUser,
                'total_qty'       => $totalQty,
                'total_harga'     => $totalHarga,
                'alamat_tujuan'   => $user->alamat,
                'catatan'         => $request->catatan,
                'metode_bayar'    => 'Virtual Account',
                'payment_status'  => 'pending',
                'status'          => 'diproses',
                'resi'            => null,
            ]);

            $itemDetails = [];

            foreach ($keranjang as $item) {
                $itemDetails[] = [
                    'id' => $item->produk->id_produk,
                    'price' => $item->produk->harga,
                    'quantity' => $item->jumlah,
                    'name' => $item->produk->nama_produk,
                ];
            }

            $params = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => $totalHarga,
                ],

                'expiry' => [
                    'unit' => 'hour',
                    'duration' => 24,
                ],

                'item_details' => $itemDetails,

                'customer_details' => [
                    'first_name' => session('username') ?? $user->username,
                    'email'      => session('email') ?? $user->email,
                ],
            ];

            $snapToken = Snap::getSnapToken($params);

            $transaksi->update([
                'snap_token' => $snapToken,
                'expired_at' => now()->addHours(24),
            ]);

            foreach ($keranjang as $item) {
                DetailTransaksiModel::create([
                    'id_transaksi' => $transaksi->id_transaksi,
                    'id_produk' => $item->id_produk,
                    'qty' => $item->jumlah,
                    'harga' => $item->produk->harga,
                    'subtotal' => $item->subtotal,
                ]);
            }

            DB::commit();

            return response()->json([
                'snapToken' => $snapToken,
            ]);
        }

        catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // CALLBACK
    public function callback(Request $request)
    {
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        $notification = new Notification();

        $signatureKey = hash(
            'sha512',
            $notification->order_id .
            $notification->status_code .
            $notification->gross_amount .
            config('midtrans.serverKey')
        );

        if ($signatureKey !== $notification->signature_key) {
            return response()->json([
                'message' => 'Invalid signature.'
            ], 403);
        }

        DB::beginTransaction();

        try {
            $transactionStatus = $notification->transaction_status;
            $orderId = $notification->order_id;
            $paymentType = $notification->payment_type;
            $transactionId = $notification->transaction_id;

            $transaksi = TransaksiModel::where('order_id', $orderId)->first();

            if (!$transaksi) {
                DB::rollBack();

                return response()->json([
                    'message' => 'Transaksi tidak ditemukan.'
                ], 404);
            }

            switch ($transactionStatus) {

                case 'capture':
                case 'settlement':

                    $transaksi->payment_status = 'paid';
                    $transaksi->payment_type = $paymentType;
                    $transaksi->transaction_id = $transactionId;
                    $transaksi->dibayar_pada = now();

                    switch ($paymentType) {

                        case 'bank_transfer':
                        case 'echannel':
                            $transaksi->metode_bayar = 'Virtual Account';
                            break;

                        case 'qris':
                            $transaksi->metode_bayar = 'QRIS';
                            break;

                    }

                    $transaksi->save();

                    foreach ($transaksi->detailTransaksi as $detail) {

                        $produk = ProdukModel::find($detail->id_produk);

                        if ($produk) {
                            if ($produk->stok < $detail->qty) {
                                throw new \Exception(
                                    "Stok {$produk->nama_produk} tidak mencukupi."
                                );
                            }
                            $produk->decrement('stok', $detail->qty);
                        }
                    }

                    KeranjangModel::where('id_user', $transaksi->id_user)->delete();

                    break;

                case 'pending':
                    $transaksi->payment_status = 'pending';
                    $transaksi->payment_type = $paymentType;
                    $transaksi->transaction_id = $transactionId;
                    $transaksi->save();
                    break;

                case 'expire':
                    $transaksi->payment_status = 'expire';
                    $transaksi->save();
                    break;

                case 'cancel':
                    $transaksi->payment_status = 'cancel';
                    $transaksi->transaction_id = $transactionId;
                    $transaksi->save();
                    break;

                case 'deny':
                    $transaksi->payment_status = 'deny';
                    $transaksi->transaction_id = $transactionId;
                    $transaksi->save();
                    break;

                default:
                    $transaksi->payment_status = 'failed';
                    $transaksi->save();
                    break;
            }

            DB::commit();

            return response()->json([
                'success' => true
            ]);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);

        }
    }

    // FINISH
    public function finish(Request $request)
    {
        return redirect('/order-saya')
            ->with('success', 'Pembayaran berhasil.');
    }

    // UNFINISH
    public function unfinish(Request $request)
    {
        return redirect('/orders')
            ->with('warning', 'Pembayaran masih menunggu.');
    }

    // ERROR
    public function error(Request $request)
    {
        return redirect('/orders')
            ->with('error', 'Pembayaran gagal.');
    }
}