<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ProdukModel;
use App\Models\KategoriModel;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // PRODUK
    public function produk(Request $request)
    {
        $query = ProdukModel::with('kategori');

        if ($request->filled('query')) {
            $query->where(function ($q) use ($request) {
                $q->where('kode_produk', 'like', '%' . $request->query . '%')
                  ->orWhere('nama_produk', 'like', '%' . $request->query . '%')
                  ->orWhere('brand', 'like', '%' . $request->query . '%');
            });
        }

        $produk = $query
            ->orderBy('id_produk', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.produk_admin', compact('produk'));
    }

    // CRUD PRODUK
    // TAMBAH PRODUK
    public function tambahProduk()
    {
        $kategori = KategoriModel::orderBy('nama_kategori')->get();

        session(['redirect_after_save_produk' => url()->previous()]);

        return view('form.tambah_produk', compact('kategori'));
    }

    public function pesanan()
    {
        return view('admin.pesanan');
    }

    public function support()
    {
        return view('admin.support_admin');
    }

    public function laporan()
    {
        return view('admin.laporan');
    }

    // PENGATURAN
    public function pengaturan()
    {
        $store = [];

        if (Storage::exists('store.json')) {
            $store = json_decode(Storage::get('store.json'), true);
        }

        return view('admin.pengaturan', compact('store'));
    }
}
