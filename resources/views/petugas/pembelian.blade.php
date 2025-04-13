@extends('layouts.layout')

@section('title', 'Transaksi Pembelian')
@section('header', 'Transaksi Pembelian')

@section('content')
  <form>
    <!-- Pilih Produk -->
    <div class="mb-4">
      <label class="block font-medium">Pilih Produk</label>
      <select class="mt-1 block w-full border rounded p-2">
        <!-- Opsi produk -->
      </select>
    </div>

    <!-- Input Jumlah -->
    <div class="mb-4">
      <label class="block font-medium">Jumlah</label>
      <input type="number" class="mt-1 block w-full border rounded p-2" min="1">
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
      Tambah ke Keranjang
    </button>
  </form>

  <!-- Daftar item keranjang (dummy) -->
  <div class="mt-6">
    <h2 class="text-xl font-semibold mb-2">Keranjang</h2>
    <ul class="border rounded p-4 bg-gray-50 space-y-2">
      <!-- Item keranjang -->
    </ul>

    <div class="mt-4">
      <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        Checkout
      </button>
    </div>
  </div>
@endsection
