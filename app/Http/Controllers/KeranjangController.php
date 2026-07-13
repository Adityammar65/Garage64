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

        $idProdukKeranjang = $keranjang->pluck('id_produk');
        $rekomendasi = ProdukModel::whereNotIn('id_produk', $idProdukKeranjang)
            ->inRandomOrder()
            ->take(4)
            ->get();

        $idUser = session('id_user');
        $cartCount = KeranjangModel::where('id_user', $idUser)
            ->sum('jumlah');
    
        return view('customer.keranjang', compact('keranjang', 'rekomendasi', 'cartCount'));
    }

    // TAMBAH KE KERANJANG
    public function tambahKeKeranjang($id)
    {
        $idUser = session('id_user');

        $product = ProdukModel::find($id);

        if (!$product) {
            return back()->with('error', 'Produk tidak ditemukan.');
        }
        $keranjang = KeranjangModel::where('id_user', $idUser)
            ->where('id_produk', $id)
            ->first();

        if (!$keranjang) {
            KeranjangModel::create([
                'id_user'   => $idUser,
                'id_produk' => $id,
                'jumlah'    => 1,
                'subtotal'  => $product->harga,
            ]);
        } else {
    
            $keranjang->jumlah++;

            $keranjang->subtotal = $keranjang->jumlah * $product->harga;

            $keranjang->save();
        }

        return back()
            ->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

     // TAMBAH QTY PRODUK
    public function tambahJumlah($id)
    {
        $keranjang = KeranjangModel::where('id_keranjang', $id)
            ->where('id_user', session('id_user'))
            ->firstOrFail();

        $produk = $keranjang->produk;

        if ($keranjang->jumlah >= $produk->stok) {
            return back()->with('error', 'Stok produk tidak mencukupi.');
        }

        $keranjang->jumlah++;
        $keranjang->subtotal = $keranjang->jumlah * $produk->harga;
        $keranjang->save();

        return back();
    }

    // KURANG QTY PRODUK
    public function kurangJumlah($id)
    {
        $keranjang = KeranjangModel::where('id_keranjang', $id)
            ->where('id_user', session('id_user'))
            ->firstOrFail();

        if ($keranjang->jumlah > 1) {

            $keranjang->jumlah--;
            $keranjang->subtotal = $keranjang->jumlah * $keranjang->produk->harga;
            $keranjang->save();

        } else {

            $keranjang->delete();

        }

        return back();
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