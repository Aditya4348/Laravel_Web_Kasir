@extends('admin.layout')

@section('content')
<section class="flex justify-between gap-5 mb-5">
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold mb-4">saldo</h2>
        <span class="text-lg font-semibold">80</span>
    </div>

    <div class="bg-white p-6 rounded shadow ">
        <h2 class="text-2xl font-semibold mb-4">Jumlah Pegawai</h2>
        <span class="text-lg font-semibold">: {{$data}}</span>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold mb-4">Jumlah Penjualan</h2>
        <span class="text-lg font-semibold">80</span>
    </div>
</section>


<div class="bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-4">Dashboard</h2>
    <p>laporan penjualan Harian</p>

    <table class="min-w-full table-auto text-left">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-6 py-3 border-b text-center">file</th>
                <th class="px-6 py-3 border-b text-center">Dowload</th>
            </tr>
        </thead>
        <tbody>

            {{-- @foreach ($petugas as $isi) --}}
            <tr class="hover:bg-gray-100">
                <td class="px-6 py-4 border-b text-center">cocote</td>
                <td class="px-6 py-4 border-b text-blue-500 cursor-pointer flex">
                    <button type="submit"
                        class="inline-block bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50">
                        Hapus
                    </button>
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
</div>
@endsection