<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Middleware\CekAdmin;
use App\Http\Middleware\CekLogin;
use App\Http\Controllers\GoogleController;

Route::get('/', [CustomerController::class, 'index']);

// AUTH ROUTES
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login/verify', [AuthController::class, 'cekLogin']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register/save', [AuthController::class, 'saveRegister']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/reset-password', [FormController::class, 'resetPasswordForm']);
Route::post('/save-password', [AuthController::class, 'resetPassword']);

// SERVICES
Route::get('/syarat-ketentuan', [ServiceController::class, 'syaratKetentuan']);
Route::get('/kebijakan-privasi', [ServiceController::class, 'kebijakanPrivasi']);
Route::get('/kebijakan-pengiriman', [ServiceController::class, 'kebijakanPengiriman']);
Route::get('/kebijakan-retur', [ServiceController::class, 'kebijakanRetur']);
Route::get('/support-center', [ServiceController::class, 'supportCenter']);

// POST-LOGIN ROUTES (CUSTOMER)
Route::get('/auth/google', [GoogleController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);
Route::middleware('cek.login')->group(function(){
    // PROFIL
    Route::get('/profile', [CustomerController::class, 'profile']);

    // ORDER
    Route::get('/order-saya', [CustomerController::class, 'order_saya']);
    Route::get('/order/{id}', [CustomerController::class, 'detailOrder']);

    // PRODUK
    Route::get('/produk', [CustomerController::class, 'produk']);
    Route::get('/produk/detail/{id}', [ProdukController::class, 'produkDetail']);

    // KERANJANG
    Route::get('/keranjang', [KeranjangController::class, 'keranjang']);
    Route::get('/produk/tambah-ke-keranjang/{id}', [KeranjangController::class, 'tambahKeKeranjang']); 
    Route::get('/keranjang/tambah/{id}', [KeranjangController::class, 'tambahJumlah']);
    Route::get('/keranjang/kurang/{id}', [KeranjangController::class, 'kurangJumlah']);
    Route::get('/keranjang/hapus/{id}', [KeranjangController::class, 'hapusKeranjang']);

    // TRANSAKSI
    Route::post('/checkout', [TransaksiController::class, 'checkout']);
    Route::post('/midtrans/callback', [TransaksiController::class, 'callback']);
    Route::get('/payment/finish', [TransaksiController::class, 'finish']);
    Route::get('/payment/unfinish', [TransaksiController::class, 'unfinish']);
    Route::get('/payment/error', [TransaksiController::class, 'error']);
});

// ADMIN ROUTES
Route::middleware('cek.admin')->group(function(){
    Route::get('/admin', [AdminController::class, 'dashboard']);

    // PRODUK DAN CRUD
    Route::get('/admin/produk', [AdminController::class, 'produk']);
    Route::get('/admin/produk/tambah', [AdminController::class, 'tambahProduk']);
    Route::post('/admin/produk/save', [ProdukController::class, 'saveProduk']);
    Route::get('/admin/produk/edit/{id}', [FormController::class, 'editProduk']);
    Route::put('/admin/produk/update/{id}', [ProdukController::class, 'updateProduk']);
    Route::delete('/admin/produk/delete/{id}', [ProdukController::class, 'deleteProduk']);

    // PRODUK DAN CRUD
    Route::get('/admin/pesanan', [AdminController::class, 'pesanan']);
    Route::get('/admin/support', [AdminController::class, 'support']);
    Route::get('/admin/laporan', [AdminController::class, 'laporan']);

    // SETTINGS
    Route::get('/admin/pengaturan', [AdminController::class, 'pengaturan']);
    Route::get('/admin/pengaturan/reset-password', [FormController::class, 'resetPassword']);
    Route::post('/admin/pengaturan/save-password', [AuthController::class, 'resetPasswordAdmin']);

    // INFO TOKO
    Route::get('/admin/pengaturan/edit-info-toko', [FormController::class, 'editInfoToko']);
    Route::post('/admin/pengaturan/save-info-toko', [FormController::class, 'saveInfoToko']);

    // SUPPORT
    Route::get('/admin/support/reply', [FormController::class, 'supportReply']);
});