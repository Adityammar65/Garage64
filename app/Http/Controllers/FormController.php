<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function tambahProduk()
    {
        session()->put('redirect_after_save_produk', url()->previous());

        return view('form.tambah_produk');
    }

    public function editProduk()
    {
        return view('form.edit_produk');
    }

    public function editInfoToko()
    {
        return view('form.edit_info_toko');
    }

    public function supportReply()
    {
        return view('form.support_reply');
    }
    
    public function resetPasswordForm()
    {
        session()->put('redirect_after_reset', url()->previous());

        return view('form.reset_password');
    }
}
