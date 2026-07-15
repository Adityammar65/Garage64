<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\KeranjangModel;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;

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
        $orderId = 'INV-' . now()->format('YmdHis');
        
        DB::beginTransaction();

        try {
            $transaksi = TransaksiModel::create([
                'kode_transaksi' => $orderId,
                'id_user' => $idUser,
                'total_qty' => $totalQty,
                'total_harga' => $totalHarga,
                'metode_bayar' => 'Midtrans',
                'status' => 'pending',
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
                    'first_name' => session('username'),
                    'email' => session('email'),
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

        DB::beginTransaction();

        try {
            $transactionStatus = $notification->transaction_status;
            $paymentType = $notification->payment_type;
            $orderId = $notification->order_id;
            $transactionId = $notification->transaction_id;
            $fraudStatus = $notification->fraud_status ?? null;

            $transaksi = TransaksiModel::where('kode_transaksi', $orderId)->first();

            if (!$transaksi) {
                DB::rollBack();

                return response()->json([
                    'message' => 'Transaksi tidak ditemukan.'
                ], 404);
            }

            $transaksi->payment_type = $paymentType;
            $transaksi->transaction_id = $transactionId;
            $transaksi->fraud_status = $fraudStatus;

            switch ($transactionStatus) {

                case 'capture':
                case 'settlement':

                    $transaksi->status = 'dibayar';
                    $transaksi->dibayar_pada = now();

                    $transaksi->save();

                    foreach ($transaksi->detailTransaksi as $detail) {

                        $produk = ProdukModel::find($detail->id_produk);

                        if ($produk) {
                            $produk->stok -= $detail->qty;

                            if ($produk->stok >= $detail->qty) {
                                $produk->decrement('stok', $detail->qty);
                            } else {
                                throw new \Exception(
                                    "Stok {$produk->nama_produk} tidak mencukupi."
                                );
                            }
                        }
                    }

                    KeranjangModel::where('id_user', $transaksi->id_user)->delete();

                    break;

                case 'pending':
                    $transaksi->status = 'pending';
                    $transaksi->save();
                    break;

                case 'expire':
                    $transaksi->status = 'expired';
                    $transaksi->save();
                    break;

                case 'cancel':
                    $transaksi->status = 'cancel';
                    $transaksi->save();
                    break;

                case 'deny':
                    $transaksi->status = 'ditolak';
                    $transaksi->save();
                    break;

                default:
                    $transaksi->status = 'gagal';
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
        return redirect('/orders')
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