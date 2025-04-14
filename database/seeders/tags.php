<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\kategori;

class tags extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        kategori::create([
            'nama' => 'makanan ringan',
            'deskripsi' => 'bahan percobaan 1',
        ]);

        kategori::create([
            'nama' => 'Makanan Berat',
            'deskripsi' => 'bahan percobaan 2',
        ]);

        kategori::create([
            'nama' => 'Minuman Soda',
            'deskripsi' => 'bahan percobaan 3',
        ]);

        kategori::create([
            'nama' => 'Perabotan Rumah',
            'deskripsi' => 'bahan percobaan 5',
        ]);
    }
}
