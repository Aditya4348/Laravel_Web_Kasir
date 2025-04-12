<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Petugas;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Petugas::create([
            'nama' => 'Admin Utama',
            'no_telepon' => '081234567890',
            'alamat' => 'Jl. Contoh No. 123, Jakarta',
            'username' => 'admin123',
            'role' => 'admin',
            'password' => 'admin12345',
        ]);

        Petugas::create([
            'nama' => 'Petugas Satu',
            'no_telepon' => '081234567891',
            'alamat' => 'Jl. Contoh No. 456, Bandung',
            'username' => 'petugas123',
            'role' => 'petugas',
            'password' => 'petugas12345',
        ]);
    }
}
