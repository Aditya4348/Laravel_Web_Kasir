@extends('admin.layout')

@section('content')
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
        <div class="bg-gray-100 p-4 rounded-lg shadow-md">
            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_barang }}"
                class="w-full h-40 object-cover rounded-md mb-4">

            <h3 class="text-lg font-semibold">{{ $produk->nama_barang }}</h3>
            <p class="text-gray-600 font-bold">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
            <p class="text-gray-500 text-sm mb-3">{{ Str::limit($produk->deskripsi, 50) }}</p>

            <!-- Tombol Aksi -->
            <div class="flex space-x-2">
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