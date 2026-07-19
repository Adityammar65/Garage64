<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\ServiceModel;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;

class AdminController extends Controller
{
    // DASHBOARD
    public function dashboard()
    {
        $totalProduk = ProdukModel::count();

        $totalOrder = TransaksiModel::count();

        $totalPendapatan = TransaksiModel::where('payment_status', 'paid')
            ->sum('total_harga');

        $totalSupport = ServiceModel::where('status', 'menunggu')->count();

        $bestSeller = ProdukModel::withSum('detailTransaksi as total_terjual', 'qty')
            ->orderByDesc('total_terjual')
            ->take(5)
            ->get();

        $topProduct = $bestSeller->first();

        $pending = TransaksiModel::where('payment_status', 'pending')->count();

        $diproses = TransaksiModel::where('status', 'diproses')->count();

        $selesai = TransaksiModel::where('status', 'selesai')->count();

        $topProduct = $bestSeller->first();

        $topProduct = $bestSeller->first();

        $latestOrders = TransaksiModel::with('user')
            ->latest()
            ->take(5)
            ->get();

        $latestServices = ServiceModel::with('user')
            ->latest()
            ->take(5)
            ->get();

        $salesChart = TransaksiModel::select(
                DB::raw('DATE(created_at) as tanggal'),
                DB::raw('SUM(total_harga) as total')
            )
            ->where('payment_status', 'paid')
            ->whereDate('created_at', '>=', now()->subDays(6))
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        return view('admin.dashboard', compact(
            'totalProduk',
            'totalOrder',
            'totalPendapatan',
            'totalSupport',
            'pending',
            'diproses',
            'selesai',
            'bestSeller',
            'topProduct',
            'latestOrders',
            'latestServices',
            'salesChart'
        ));
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

    // FILTER TRANSAKSI
    private function getFilteredTransaksi($filter)
    {
        $query = TransaksiModel::query();

        switch ($filter) {

            case 'week':

                $query->whereBetween('created_at', [
                    now()->startOfWeek(),
                    now()->endOfWeek()
                ]);

            break;

            case 'year':

                $query->whereYear('created_at', now()->year);

            break;

            default:

                $query->whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year);

            break;

        }

        return $query;
    }

    // FILTER DETAIL
    private function getFilteredDetail($filter)
    {
        return DetailTransaksiModel::with([
                'produk',
                'transaksi'
            ])
            ->whereHas('transaksi', function ($query) use ($filter) {

                switch ($filter) {

                    case 'week':

                        $query->whereBetween('created_at', [
                            now()->startOfWeek(),
                            now()->endOfWeek()
                        ]);

                    break;

                    case 'year':

                        $query->whereYear('created_at', now()->year);

                    break;

                    default:

                        $query->whereMonth('created_at', now()->month)
                            ->whereYear('created_at', now()->year);

                    break;

                }

            });
    }

    // LAPORAN
    public function laporan(Request $request)
    {
        $filter = $request->get('filter','month');

        $transaksi = $this->getFilteredTransaksi($filter);

        $detail = $this->getFilteredDetail($filter);

        $totalOrder = (clone $transaksi)->count();

        $produkTerjual = (clone $transaksi)->sum('total_qty');

        $totalPendapatan = (clone $transaksi)->sum('total_harga');

        $averageOrder = $totalOrder
            ? $totalPendapatan / $totalOrder
            : 0;

        $laporanPenjualan = (clone $detail)
            ->latest()
            ->paginate(10,['*'],'penjualan');

        $laporanKeuangan = (clone $transaksi)
            ->with('user')
            ->latest()
            ->paginate(10,['*'],'keuangan');

        if($request->ajax()){

            return response()->json([

                'summary'=>view(
                    'admin.partials.summary',
                    compact(
                        'totalOrder',
                        'produkTerjual',
                        'totalPendapatan',
                        'averageOrder'
                    )
                )->render(),

                'penjualan'=>view(
                    'admin.partials.penjualan',
                    compact('laporanPenjualan')
                )->render(),

                'keuangan'=>view(
                    'admin.partials.keuangan',
                    compact('laporanKeuangan')
                )->render()

            ]);

        }

        return view('admin.laporan',compact(
            'filter',
            'totalOrder',
            'produkTerjual',
            'totalPendapatan',
            'averageOrder',
            'laporanPenjualan',
            'laporanKeuangan'
        ));
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
