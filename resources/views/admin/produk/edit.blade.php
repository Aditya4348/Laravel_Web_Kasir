@extends('admin.layout')

@section('content')
<div class="max-w-full mx-auto bg-white p-6 md:px-8 rounded-lg shadow-lg">
    <form action="{{ route('produk.update', $products) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <!-- Alert -->
        @if(session('gagal'))
        <div
            class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-md shadow-md flex items-center space-x-2">
            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            <span>{{ session('gagal') }}</span>
        </div>
        @endif

        <h2 class="text-2xl font-semibold text-gray-700 mb-4 text-center">Tambah Produk</h2>

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">

            <!-- Preview Foto Barang -->
            <div class="flex flex-col items-center">
                <img id="preview-image" src="{{ asset('storage/'. $products->foto_barang) }}" alt="{{$products->foto_barang}}"
                    class="w-64 h-64 object-cover border border-black rounded-md shadow-md">
            </div>

            <!-- Form Input -->
            <div class="space-y-4">
                <!-- Upload Foto Barang -->
                <div>
                    <label for="foto_barang" class="block text-sm font-medium text-gray-700">Foto Barang</label>
                    <input type="file" name="foto_barang" id="foto_barang" accept="image/*"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                        onchange="previewFile()" value="{{$products->foto_barang}}">
                </div>

                <!-- Input Nama Barang -->
                <div>
                    <label for="nama_barang" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" value="{{$products->nama_barang}}">
                    @error('nama_barang')
                    <p>{{$message}}</p>
                    @enderror
                </div>

                <!-- Input Harga Barang -->
                <div>
                    <label for="harga_barang" class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="text" name="harga_barang" id="harga_barang"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" value="{{$products->harga_barang}}">
                    @error('harga_barang')
                    <p>{{$message}}</p>
                    @enderror
                </div>

                <!-- Dropdown Kategori Barang -->
                <div>
                    <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select name="kategori_id" id="kategori_id"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach($kategoris as $kategori)
                        <option name value="{{ $kategori->nama }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <p>{{$message}}</p>
                    @enderror
                </div>

                <!-- Input Deskripsi Barang -->
                <div>
                    <label for="deskripsi_barang" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi_barang" id="deskripsi_barang"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" value='{{$products->deskripsi_barang}}'></textarea>
                    @error('nama_barang')
                        <p>{{$message}}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 text-center">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md shadow-md transition duration-300">
                Submit
            </button>
        </div>
    </form>


    <script>
        function previewFile() {
            const file = document.getElementById('foto_barang').files[0];
            const preview = document.getElementById('preview-image');
    
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</div>
@endsection