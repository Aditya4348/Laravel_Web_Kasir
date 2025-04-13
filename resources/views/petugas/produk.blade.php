@extends('layouts.layout')

@section('title', 'Daftar Produk')
@section('header', 'Daftar Produk')

@section('content')
  <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
    <thead class="bg-gray-100">
      <tr>
        <th class="p-2 text-left">Nama</th>
        <th class="p-2 text-left">Harga</th>
        <th class="p-2 text-left">Stok</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      <!-- Data produk dummy -->
    </tbody>
  </table>
@endsection
