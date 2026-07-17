<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ServiceModel;

class ServiceController extends Controller
{
    // VIEW
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

    // KIRIM KELUHAN
    public function store(Request $request)
    {
        $request->validate([
            'subjek' => 'required|string|max:255',
            'pesan'  => 'required|string',
        ]);

        ServiceModel::create([
            'id_user' => session('id_user'),
            'subjek' => $request->subjek,
            'pesan' => $request->pesan,
            'status' => 'Menunggu',
            'balasan' => null,
            'dibalas_pada' => null,
        ]);

        return redirect()->back()->with(
            'success',
            'Pertanyaan berhasil dikirim.'
        );
    }
}
