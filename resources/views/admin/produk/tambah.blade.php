@extends('admin.layout')

@section('content')
<div class="max-w-full mx-auto bg-white p-6 md:px-8 rounded-lg shadow-lg">
    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h2 class="text-2xl font-semibold text-gray-700 mb-4 text-center flex">
            <a href="{{ url()->previous() }}" class="mr-3 text-gray-600 hover:text-gray-800 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#FFFFFF">
                    <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
                </svg>
            </a>
            Tambah Produk
        </h2>
        <!-- Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">

            <!-- Preview Foto Barang -->
            <div class="flex flex-col items-center">
                <img id="preview-image" src="{{ asset('storage/default.png') }}" alt="Preview Gambar"
                    class="w-64 h-64 object-cover border border-black rounded-md shadow-md">
            </div>

            <!-- Form Input -->
            <div class="space-y-4">
                <!-- Upload Foto Barang -->
                <div>
                    <label for="foto_barang" class="block text-sm font-medium text-gray-700">Foto Barang</label>
                    <input type="file" name="foto_barang" id="foto_barang" accept="image/*"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required
                        onchange="previewFile()">
                </div>

                <!-- Input Nama Barang -->
                <div>
                    <label for="nama_barang" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required>
                    @error('nama_barang')
                    <p>{{$message}}</p>
                    @enderror
                </div>

                <!-- Input Harga Barang -->
                <div class="flex justify-between">
                    <div>
                        <label for="harga_barang" class="block text-sm font-medium text-gray-700">Harga</label>
                        <input type="text" name="harga_barang" id="harga_barang"
                            class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('harga_barang')
                        <p>{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="stok_barang" class="block text-sm font-medium text-gray-700">Stok Barang</label>
                        <input type="number" name="stok_barang" id="stok_barang"
                            class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <!-- Dropdown Kategori Barang -->
                <div>
                    <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select name="kategori_id" id="kategori_id"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach($kategoris as $kategori)
                        <option name value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
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
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"></textarea>
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