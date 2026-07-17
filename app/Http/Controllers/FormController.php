<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukModel;
use Illuminate\Support\Facades\Storage;
use App\Models\KategoriModel;
use App\Models\ServiceModel;


class FormController extends Controller
{
    public function tambahProduk()
    {
        session()->put('redirect_after_save_produk', url()->previous());

        return view('form.tambah_produk');
    }

    public function editProduk($id)
    {
        session()->put('redirect_after_edit', url()->previous());

        $produk = ProdukModel::findOrFail($id);
        $kategori = KategoriModel::orderBy('nama_kategori')->get();

        return view('form.edit_produk', compact('produk', 'kategori'));
    }

    // EDIT INFO TOKO
    public function editInfoToko()
    {
        return view('form.edit_info_toko');
    }

    // SAVE INFO TOKO
    public function saveInfoToko(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required|max:100',
            'alamat_toko' => 'required',
            'no_telp_toko' => 'required|max:20',
            'email_toko' => 'required|email',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
        ]);

        $data = [
            'nama_toko' => $request->nama_toko,
            'alamat_toko' => $request->alamat_toko,
            'no_telp_toko' => $request->no_telp_toko,
            'email_toko' => $request->email_toko,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
        ];

        Storage::put(
            'store.json',
            json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );

        return back()->with('success', 'Informasi toko berhasil diperbarui.');
    }

    public function supportReplyForm($id)
    {
        $service = ServiceModel::with('user')
            ->findOrFail($id);

        return view('form.support_reply', compact('service'));
    }
    
    public function resetPasswordForm()
    {
        session()->put('redirect_after_reset', url()->previous());

        return view('form.reset_password');
    }
}
