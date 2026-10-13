<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Publik (tanpa login)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{produk}', [ProdukController::class, 'show']);

// Wajib login
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', fn (Request $request) => $request->user());

    Route::middleware('role:admin')->prefix('admin')->group(function () {
        Route::get('/ping', fn () => ['pesan' => 'halo admin']);
    });

    Route::middleware('role:mitra')->prefix('mitra')->group(function () {
        // produk, jadwal, pesanan masuk, penarikan saldo (step berikutnya)
    });

    Route::middleware('role:customer')->group(function () {
        // keranjang, pesanan, pembayaran, ulasan (step berikutnya)
    });
});
