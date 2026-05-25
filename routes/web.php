<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;

Route::get('/', [CustomerController::class, 'index']);
Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::get('/syarat-ketentuan', [ServiceController::class, 'syaratKetentuan']);
Route::get('/kebijakan-privasi', [ServiceController::class, 'kebijakanPrivasi']);
Route::get('/kebijakan-pengiriman', [ServiceController::class, 'kebijakanPengiriman']);
Route::get('/kebijakan-retur', [ServiceController::class, 'kebijakanRetur']);
Route::get('/support-center', [ServiceController::class, 'supportCenter']);