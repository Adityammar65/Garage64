<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ProdukModel;
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
        return view('customer.produk', compact('produk'));
    }
    
    public function profile()
    {
        return view('customer.profile');
    }
}
