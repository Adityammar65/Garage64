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

        $products = $query
            ->orderBy('id_produk', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.produk_admin', compact('products'));
    }

    // CRUD PRODUK
    // TAMBAH PRODUK
    public function tambahProduk()
    {
        $categories = KategoriModel::orderBy('nama_kategori')->get();

        session(['redirect_after_save_produk' => url()->previous()]);

        return view('form.tambah_produk', compact('categories'));
    }

    // SAVE PRODUK
    public function saveProduk(Request $request)
    {
        $request->validate([
            'kode_produk' => 'required|unique:produk,kode_produk',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'nama_produk' => 'required|string|max:255',
            'brand' => 'required|string|max:100',
            'skala' => 'required|string|max:20',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
            'is_active' => 'required|boolean',
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')
                ->store('produk', 'public');
        }

        ProdukModel::create([
            'kode_produk' => $request->kode_produk,
            'id_kategori' => $request->id_kategori,
            'nama_produk' => $request->nama_produk,
            'brand' => $request->brand,
            'skala' => $request->skala,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'is_active' => $request->is_active,
        ]);

        return redirect(
            session()->pull('redirect_after_save_produk'))
            ->with('success', 'Produk berhasil ditambahkan.');
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
