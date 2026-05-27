<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminController;

Route::get('/', [CustomerController::class, 'index']);
Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::get('/syarat-ketentuan', [ServiceController::class, 'syaratKetentuan']);
Route::get('/kebijakan-privasi', [ServiceController::class, 'kebijakanPrivasi']);
Route::get('/kebijakan-pengiriman', [ServiceController::class, 'kebijakanPengiriman']);
Route::get('/kebijakan-retur', [ServiceController::class, 'kebijakanRetur']);
Route::get('/support-center', [ServiceController::class, 'supportCenter']);
Route::get('/admin', [AdminController::class, 'dashboard']);
Route::get('/admin/produk', [AdminController::class, 'produk']);
Route::get('/admin/order', [AdminController::class, 'order']);
Route::get('/admin/support', [AdminController::class, 'support']);
Route::get('/admin/pengaturan', [AdminController::class, 'pengaturan']);