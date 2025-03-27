@extends('admin.layout')

@section('content')
<div class="max-w-full mx-auto bg-white p-6 md:p-5 rounded-lg shadow-lg">

    <h2 class="text-2xl font-semibold text-gray-700 mb-6 text-center">Edit Petugas</h2>

    <form action="{{ route('petugas.update', $petugas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nama -->
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text"
                    class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                    name="nama" id="nama" value="{{ $petugas->nama }}">
            </div>

            <!-- No Telepon -->
            <div>
                <label for="no_telepon" class="block text-sm font-medium text-gray-700">No Telepon</label>
                <input type="text"
                    class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                    name="no_telepon" id="no_telepon" value="{{ $petugas->no_telepon }}">
            </div>

            <!-- Username -->
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text"
                    class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                    name="username" id="username" value="{{ $petugas->username }}">
            </div>
        </div>

        <!-- Alamat (Full Width) -->
        <div class="mt-4">
            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
            <textarea class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                name="alamat" id="alamat">{{ $petugas->alamat }}</textarea>
        </div>

        <!-- Tombol Submit -->
        <div class="mt-6 text-center">
            <button type="submit" class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 
                focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 transition-all duration-200">
                Update
            </button>
        </div>
    </form>
</div>
@endsection