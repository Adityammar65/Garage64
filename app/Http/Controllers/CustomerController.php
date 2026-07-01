<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return view('customer.produk');
    }
    
}
