@extends('admin.layout')

@section('content')

@if(session('sukses'))
    <div id="alert-success" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md shadow-md flex items-center space-x-2 mb-2">
        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
        </svg>
        <span>{{ session('sukses') }}</span>
    </div>

    <script>
        setTimeout(function() {
            document.getElementById('alert-success').style.display = 'none';
        }, 2000); // 2000ms = 2 detik
    </script>
@endif

@if(session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md shadow-md flex items-center space-x-2 mb-2">
        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
        <span>{{ session('error') }}</span>
    </div>
@endif


<div class="bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-4">List Kategori</h2>
    <div class="flex justify-between items-center">
        <p>Daftar kategori.</p>
        <a href="{{route('Kategori.create')}}">Tambah</a>
    </div>
    <section class="overflow-x-auto bg-white shadow-md rounded-lg mt-1">
        <table class="min-w-full table-auto text-left">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 border-b text-center">Nama Kategori</th>
                    <th class="px-6 py-3 border-b text-center">Deskripsi</th>
                    <th class="px-6 py-3 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($kategori as $isi)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4 border-b text-center">{{ $isi->nama}}</td>
                        <td class="px-6 py-4 border-b text-center">{{$isi->deskripsi}}</td>
                        <td class="px-6 py-4 border-b text-blue-500 cursor-pointer flex">
                            <a href="{{route('Kategori.edit', $isi->id)}}"
                                class="inline-block bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 mb-2 md:mb-0 md:mr-2">
                                Edit
                            </a>
                            <form action="{{route('Kategori.destroy', $isi->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="inline-block bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <!-- Tambah lebih banyak baris jika diperlukan -->
            </tbody>
        </table>
    </section>
</div>
@endsection