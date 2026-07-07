<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Middleware\CekAdmin;
use App\Http\Middleware\CekLogin;


// AUTH ROUTES
Route::get('/', [CustomerController::class, 'index']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login/verify', [AuthController::class, 'cekLogin']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register/save', [AuthController::class, 'saveRegister']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/reset-password', [FormController::class, 'resetPasswordForm']);
Route::post('/save-new-password', [AuthController::class, 'resetPassword']);

Route::get('/syarat-ketentuan', [ServiceController::class, 'syaratKetentuan']);
Route::get('/kebijakan-privasi', [ServiceController::class, 'kebijakanPrivasi']);
Route::get('/kebijakan-pengiriman', [ServiceController::class, 'kebijakanPengiriman']);
Route::get('/kebijakan-retur', [ServiceController::class, 'kebijakanRetur']);
Route::get('/support-center', [ServiceController::class, 'supportCenter']);

Route::middleware('cek.login')->group(function(){
    Route::get('/orders', [CustomerController::class, 'order_saya']);
    Route::get('/produk', [CustomerController::class, 'produk']);
    //Route::get('/produk/detail', [ProdukController::class, 'produkDetail']);
    Route::get('/produk/detail/{id}', [ProdukController::class, 'produkDetail'])->name('produk.detail');
    Route::get('/keranjang', [KeranjangController::class, 'keranjang']);
    
});

// ADMIN ROUTES
Route::middleware('cek.admin')->group(function(){
    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::get('/admin/produk', [AdminController::class, 'produk']);
    Route::get('/admin/pesanan', [AdminController::class, 'pesanan']);
    Route::get('/admin/support', [AdminController::class, 'support']);
    Route::get('/admin/laporan', [AdminController::class, 'laporan']);
    Route::get('/admin/pengaturan', [AdminController::class, 'pengaturan']);
    Route::get('/admin/produk/tambah', [AdminController::class, 'tambahProduk']);
    Route::post('/admin/produk/save', [AdminController::class, 'saveProduk']);
    Route::get('/admin/produk/edit', [FormController::class, 'editProduk']);
    Route::get('/admin/pengaturan/edit-info-toko', [FormController::class, 'editInfoToko']);
    Route::get('/admin/support/reply', [FormController::class, 'supportReply']);
    Route::get('/admin/pengaturan/reset-password', [FormController::class, 'resetPassword']);
});