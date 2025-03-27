@extends('admin.layout')

@section('content')
<div class="max-w-full mx-auto bg-white p-6 md:px-8 rounded-lg shadow-lg">
    <form action="{{ route('petugas.store') }}" method="POST">
        @csrf

        <!-- Alert -->
        @if(session('gagal'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-md shadow-md flex items-center space-x-2">
                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                <span>{{ session('gagal') }}</span>
            </div>
        @endif

        <h2 class="text-2xl font-semibold text-gray-700 mb-2 text-center">Edit Petugas</h2>

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Input Nama -->
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" value=""
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Input No Telepon -->
            <div>
                <label for="no_telepon" class="block text-sm font-medium text-gray-700">No Telepon</label>
                <input type="text" name="no_telepon" id="no_telepon" value=""
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Input Username -->
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" value=""
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required>
            </div>
        </div>

        <!-- Input Alamat (Full Width) -->
        <div class="mt-4">
            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
            <textarea name="alamat" id="alamat"
                class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" required></textarea>
        </div>

        <!-- Password Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
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
</div>
@endsection
