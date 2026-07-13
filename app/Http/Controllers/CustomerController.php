<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\TransaksiModel;
use App\Models\KeranjangModel;

class CustomerController extends Controller
{
    public function index()
    {
        $store = [];
    
        if (Storage::exists('store.json')) {
            $store = json_decode(Storage::get('store.json'), true);
        }
    
        $idUser = session('id_user');
    
        $cartCount = KeranjangModel::where('id_user', $idUser)
                        ->sum('jumlah'); // atau ->count()
    
        return view('customer.landing', compact('store', 'cartCount'));
    }

    public function order_saya()
    {
        return view('customer.orders');
    }

    public function produk()
    {
        $produk = ProdukModel::latest()->get();
        $idUser = session('id_user');
        $cartCount = KeranjangModel::where('id_user', $idUser)
                        ->sum('jumlah'); // atau ->count()
        return view('customer.produk', compact('produk','cartCount'));
    }
    
    public function profile()
    {
        $user = UserModel::findOrFail(session('id_user'));

        $cartCount = KeranjangModel::where('id_user', $user->id_user)
                        ->sum('jumlah');

        $totalPesanan = TransaksiModel::where('id_user', $user->id_user)
                            ->count();

        $totalKeranjang = KeranjangModel::where('id_user', $user->id_user)
                            ->count();

        $totalBelanja = TransaksiModel::where('id_user', $user->id_user)
                            ->where('status', 'selesai')
                            ->sum('total_harga');

        return view('customer.profile', compact(
            'user',
            'cartCount',
            'totalPesanan',
            'totalKeranjang',
            'totalBelanja'
        ));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50',
            'email' => 'required|email|max:100',
        ]);

        $user = UserModel::findOrFail(session('id_user'));

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
        ]);

        // Update session
        session([
            'username' => $user->username,
            'email' => $user->email,
        ]);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
