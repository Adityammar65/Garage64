<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function syaratKetentuan() {
        return view('service.syarat_ketentuan');
    }

    public function kebijakanPrivasi() {
        return view('service.kebijakan_privasi');
    }

    public function kebijakanPengiriman() {
        return view('service.kebijakan_pengiriman');
    }

    public function kebijakanRetur() {
        return view('service.kebijakan_retur');
    }

    public function supportCenter() {
        return view('service.support_center');
    }
}
