<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriModel;
use App\Models\ProdukModel;
use Illuminate\Support\Facades\Storage;
use App\Models\KeranjangModel;

class ProdukController extends Controller
{
    // CUSTOMER SIDE
    public function produkDetail($id)
    {
        $produk = ProdukModel::with('kategori')->where('id_produk', $id)->firstOrFail();

        $idUser = session('id_user');
        $cartCount = KeranjangModel::where('id_user', $idUser)
            ->sum('jumlah'); // atau ->count()
    
        return view('customer.produk-detail', compact('produk','cartCount'));
    }

    // ADMIN SIDE
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

    // CRUD PRODUK
    // TAMBAH PRODUK
    public function tambahProduk()
    {
        $kategori = KategoriModel::orderBy('nama_kategori')->get();

        session(['redirect_after_save_produk' => url()->previous()]);

        return view('form.tambah_produk', compact('kategori'));
    }
    
    // UPDATE PRODUK
    public function updateProduk(Request $request, $id)
    {
        $produk = ProdukModel::findOrFail($id);

        $request->validate([
            'kode_produk' => 'required|max:50',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'nama_produk' => 'required|max:255',
            'brand' => 'required|max:100',
            'skala' => 'required',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'is_active' => 'required|boolean',
            'foto_produk' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $gambar = $produk->gambar;

        if ($request->hasFile('foto_produk')) {
            if (!empty($produk->gambar) && Storage::disk('public')->exists($produk->gambar)) {
                Storage::disk('public')->delete($produk->gambar);
            }

            $gambar = $request->file('foto_produk')->store('produk', 'public');
        }

        $produk->update([
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

        return redirect(session()->pull('redirect_after_edit'))
            ->with('success', 'Produk berhasil diperbarui.');
    }

    // DELETE PRODUK
    public function deleteProduk($id)
    {
        $produk = ProdukModel::findOrFail($id);

        if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
            Storage::disk('public')->delete($produk->gambar);
        }

        $produk->delete();

        return redirect()->back()
            ->with('success', 'Produk berhasil dihapus.');
    }
}