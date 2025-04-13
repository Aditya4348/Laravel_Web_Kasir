@extends('layouts.layout')

@section('title', 'Laporan Penjualan')
@section('header', 'Laporan Penjualan')

@section('content')
  <form class="mb-4">
    <div class="flex gap-4">
      <div>
        <label>Dari Tanggal:</label>
        <input type="date" class="border rounded p-2">
      </div>
      <div>
        <label>Sampai Tanggal:</label>
        <input type="date" class="border rounded p-2">
      </div>
      <div class="flex items-end">
        <button class="bg-blue-500 text-white px-4 py-2 rounded">Tampilkan</button>
      </div>
    </div>
  </form>

  <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
    <thead class="bg-gray-100">
      <tr>
        <th class="p-2 text-left">Tanggal</th>
        <th class="p-2 text-left">Produk</th>
        <th class="p-2 text-left">Jumlah</th>
        <th class="p-2 text-left">Total</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      <!-- Data laporan dummy -->
    </tbody>
  </table>
@endsection
