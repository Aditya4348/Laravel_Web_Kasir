<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\kategori;

class products extends Model
{
    use HasFactory;


    protected $fillable = [
        'nama_barang',
        'harga_barang',
        'deskripsi_barang',
        'foto_barang',
        'stok_barang',
        'kategori_id'
    ];

    public function kategori(){
        return $this->belongsToMany(Kategori::class, 'kategori_produk', 'produk_id', 'kategori_id');

    }
}
