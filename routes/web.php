<?php

use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;


Route::get('/list', [PetugasController::class, 'index'], function () {
    return view('admin.petugas');
})->name('petugas.dashboard');
Route::resource('petugas', PetugasController::class)->parameters(['petugas' => 'petugas']);

Route::get('/produk', function () {
    return view('admin.produk.products');
})->name('products');
Route::resource('produk', ProductsController::class)->parameters(['produk' => 'products']);
Route::resource('Kategori', KategoriController::class)->parameters(['Kategori' => 'kategori']);


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');


Route::get('/', function () {
    return view('welcome');
})->name('login');




