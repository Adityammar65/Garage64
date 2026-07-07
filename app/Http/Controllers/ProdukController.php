<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\KategoriModel;
use App\Models\ProdukModel;

class ProdukController extends Controller
{
    // CUSTOMER SIDE
    public function produkDetail($id)
    {
        $product = ProdukModel::where('id_produk', $id)->firstOrFail();
    
        return view('customer.produk-detail', compact('product'));
    }
}