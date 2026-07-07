<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProdukController extends Controller
{
    public function produkDetail()
    {
        return view('customer.produk-detail');
    }
}