<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\KategoriModel;

class ProdukController extends Controller
{
    // CUSTOMER SIDE
    public function produkDetail()
    {
        return view('customer.produk-detail');
    }
}