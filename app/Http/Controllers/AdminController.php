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

    public function order()
    {
        return view('admin.order');
    }

    public function support()
    {
        return view('admin.support_admin');
    }

    public function pengaturan()
    {
        return view('admin.pengaturan');
    }
}
