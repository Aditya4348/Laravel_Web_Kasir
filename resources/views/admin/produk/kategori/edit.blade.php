@extends('admin.layout')

@section('content')
<div class="max-w-full mx-auto bg-white p-6 md:px-8 rounded-lg shadow-lg">
    <form action="{{ route('Kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h2 class="text-2xl font-semibold text-gray-700 mb-4 text-center">Tambah Kategori</h2>

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
            <!-- Form Input -->
            <div class="space-y-4">

                <!-- Input Nama Barang -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                    <input type="text" name="nama" id="nama"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required
                        value="{{$kategori->nama}}">
                </div>

                <!-- Input Deskripsi Barang -->
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Kategori</label>
                    <textarea name="deskripsi" id="deskripsi"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                        >{{$kategori->deskripsi}}</textarea>
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