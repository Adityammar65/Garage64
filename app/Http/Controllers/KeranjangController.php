<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukModel;
use App\Models\KeranjangModel;

class KeranjangController extends Controller
{
    public function keranjang()
    {
    $idUser = session('id_user');

    $keranjang = KeranjangModel::where('id_user', $idUser)
        ->with('produk')
        ->get();

    return view('customer.keranjang', compact('keranjang'));
    }
    public function tambahKeKeranjang($id)
    {
        //mencari siapa yg login
        $idUser = session('id_user');

        //mencari produk berdasarkan id
        $product = ProdukModel::find($id);

        //mengecek apakah produk ada atau tidak
        if (!$product) {
            return redirect()
            ->back()->with('error', 'Produk tidak ditemukan.');
        }
        //mengecek apakah produk sudah ada di keranjang
        $keranjang = KeranjangModel :: where('id_user', $idUser)
            ->where('id_produk', $id)
            ->first();
        //kalau belum ada, maka buat baru
            if (!$keranjang) {

                KeranjangModel::create([
                    'id_user'   => $idUser,
                    'id_produk' => $id,
                    'jumlah'    => 1,
                    'subtotal'  => $product->harga,
                ]);
            //kalau sudah ada, maka update jumlah dan subtotal
            } else {
        
                $keranjang->jumlah++;

                $keranjang->subtotal = $keranjang->jumlah * $product->harga;

                $keranjang->save();
            }
        return back()
            ->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }
    public function hapusKeranjang($id)
    {
        $keranjang = KeranjangModel::find($id);

        if (!$keranjang) {
            return redirect()
                ->back()->with('error', 'Item keranjang tidak ditemukan.');
        }

        $keranjang->delete();

        return back()
            ->with('success', 'Item keranjang berhasil dihapus.');
    }
}