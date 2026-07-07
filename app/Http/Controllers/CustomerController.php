<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukModel;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.landing', ['items' => '$items']);
    }

    public function order_saya()
    {
        return view('customer.orders');
    }

    public function produk()
    {
        $products = ProdukModel::latest()->get();
        return view('customer.produk', compact('products'));
    }
    
}
