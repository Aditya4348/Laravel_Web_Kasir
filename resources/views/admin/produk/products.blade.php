@extends('admin.layout')

@section('content')

<!-- Alert -->
@if(session('success'))
    <div id="alert-success" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md shadow-md flex items-center space-x-2 mb-2">
        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
        </svg>
        <span>{{ session('success') }}</span>
    </div>
@elseif(session('error'))
<div
    class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-md shadow-md flex items-center space-x-2">
    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
    </svg>
    <span>{{ session('error') }}</span>
</div>
@endif

<div class="bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center flex-row">
        <div>
            <h2 class="text-2xl font-semibold mb-4">List Produk</h2>
            <p class="text-gray-600 mb-6">Daftar produk yang ada di sistem kasir.</p>
        </div>
        <div class="flex flex-col gap-3">
            <a href="{{ route('Kategori.index') }}"
                class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 hover:shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 7a2 2 0 012-2h4l2 2h6a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"></path>
                </svg>
                Lihat Kategori
            </a>
            <a href="{{ route('produk.create') }}"
                class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 hover:shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Produk
            </a>
        </div>
    </div>


    <!-- Grid Produk -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($products as $produk)
        <div class="bg-white p-4 rounded-lg shadow-md transition duration-300 hover:shadow-lg">
            <!-- Gambar Produk -->
            <img src="{{ asset('storage/' . $produk->foto_barang) }}" alt="{{ $produk->nama_barang }}"
                class="w-full h-40 object-cover rounded-md mb-4">

            <!-- Informasi Produk -->
            <div class="space-y-2">
                <!-- Nama Produk -->
                <h3 class="text-lg font-semibold text-gray-800">{{ $produk->nama_barang }}</h3>

                <!-- Kategori -->
                <div class="flex gap-2">
                    <span class="text-xs font-medium px-2.5 py-1 rounded-md bg-blue-500 text-white">
                        {{ $produk->kategori->nama ?? 'Tidak ada kategori' }}
                    </span>

                    <span class="text-xs font-medium px-2.5 py-1 rounded-md text-white {{$produk->stok_barang == 0 ? 'bg-red-500' : 'bg-blue-500'}}">
                        {{ $produk->stok_barang == 0 ? 'Stok Habis' : 'Stok Barang: '. $produk->stok_barang }}
                    </span>
                    
                </div>

                <!-- Harga Produk -->
                <p class="text-gray-600 font-bold">{{ formatRupiah($produk->harga_barang) }}</p>

                <!-- Deskripsi Singkat -->
                <p class="text-gray-500 text-sm">{{ Str::limit($produk->deskripsi, 50) }}</p>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex space-x-2 mt-4">
                <a href="{{ route('produk.edit', $produk->id) }}"
                    class="px-3 py-2 bg-blue-500 text-white text-sm rounded-md hover:bg-blue-600 transition">
                    Edit
                </a>
                <form action="{{ route('produk.destroy', $produk->id) }}" method="POST"
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-3 py-2 bg-red-500 text-white text-sm rounded-md hover:bg-red-600 transition">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection