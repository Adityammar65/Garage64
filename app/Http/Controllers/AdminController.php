<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\ServiceModel;
use App\Models\TransaksiModel;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // PRODUK
    public function showProduk(Request $request)
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

    // ORDER MASUK
    public function showOrder(Request $request)
    {
        $query = TransaksiModel::with([
            'user',
            'detailTransaksi.produk'
        ]);

        if ($request->filled('query')) {
            $query->where(function ($q) use ($request) {
                $q->where('order_id', 'like', '%' . $request->query . '%')
                ->orWhereHas('user', function ($user) use ($request) {
                    $user->where('username', 'like', '%' . $request->query . '%');
                });
            });
        }

        $orders = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.order_admin', compact('orders'));
    }

    // DETAIL ORDER
    public function detailOrder($id)
    {
        $transaksi = TransaksiModel::with([
            'user',
            'detailTransaksi.produk'
        ])->findOrFail($id);

        return view('admin.order_detail_admin', compact('transaksi'));
    }

    // SUPPORT CENTER
    public function support()
    {
        $services = ServiceModel::with('user')
            ->orderByRaw("
                CASE
                    WHEN status = 'Menunggu' THEN 1
                    WHEN status = 'Diproses' THEN 2
                    WHEN status = 'Selesai' THEN 3
                    ELSE 4
                END
            ")
            ->latest()
            ->get();

        return view('admin.support_admin', compact('services'));
    }

    public function replySupport(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'balasan' => 'required|string',
        ]);

        $service = ServiceModel::findOrFail($id);

        $service->update([
            'status' => $request->status,
            'balasan' => $request->balasan,
            'dibalas_pada' => now(),
        ]);

        return redirect('/admin/support')
            ->with('success', 'Balasan berhasil dikirim.');
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
