<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProdukController;

// CUSTOMER ROUTES
Route::get('/', [CustomerController::class, 'index']);
Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::get('/syarat-ketentuan', [ServiceController::class, 'syaratKetentuan']);
Route::get('/kebijakan-privasi', [ServiceController::class, 'kebijakanPrivasi']);
Route::get('/kebijakan-pengiriman', [ServiceController::class, 'kebijakanPengiriman']);
Route::get('/kebijakan-retur', [ServiceController::class, 'kebijakanRetur']);
Route::get('/support-center', [ServiceController::class, 'supportCenter']);
Route::get('/orders', [CustomerController::class, 'order_saya']);
Route::get('/produk', [CustomerController::class, 'produk']);
Route::get('/produk/detail', [ProdukController::class, 'produkDetail']);


// ADMIN ROUTES
Route::get('/admin', [AdminController::class, 'dashboard']);
Route::get('/admin/produk', [AdminController::class, 'produk']);
Route::get('/admin/pesanan', [AdminController::class, 'pesanan']);
Route::get('/admin/support', [AdminController::class, 'support']);
Route::get('/admin/laporan', [AdminController::class, 'laporan']);
Route::get('/admin/pengaturan', [AdminController::class, 'pengaturan']);
Route::get('/admin/produk/tambah', [FormController::class, 'tambahProduk']);
Route::get('/admin/produk/edit', [FormController::class, 'editProduk']);
Route::get('/admin/pengaturan/edit-info-toko', [FormController::class, 'editInfoToko']);
Route::get('/admin/support/reply', [FormController::class, 'supportReply']);
Route::get('/admin/pengaturan/reset-password', [FormController::class, 'resetPassword']);
Route::get('/reset-password', [FormController::class, 'resetPassword']);