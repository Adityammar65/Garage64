<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function produk()
    {
        return view('admin.produk_admin');
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

    public function pengaturan()
    {
        return view('admin.pengaturan');
    }
}
