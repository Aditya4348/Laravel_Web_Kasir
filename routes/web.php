<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;



Route::resource('login', AuthController::class);
Route::get('/', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'store'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Group route dengan middleware Auth dan Role
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index'],function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::resource('petugas', PetugasController::class)->parameters(['petugas' => 'petugas']);
    Route::resource('produk', ProductsController::class)->parameters(['produk' => 'products']);
    Route::resource('Kategori', KategoriController::class)->parameters(['Kategori' => 'kategori']);
})->name('admin');

Route::middleware(['auth', 'role:petugas'])->group(function () {
   
})->name('petugas');

    Route::prefix('petugas')->name('petugas.')->group(function () {
        Route::get('/pembelian', fn() => view('petugas.pembelian'))->name('pembelian');
        Route::get('/produk', fn() => view('petugas.produk'))->name('produk');
        Route::get('/laporan', fn() => view('petugas.laporan'))->name('laporan');
    });