<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use app\Models\products;


class kategori extends Model
{
    use HasFactory;


    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    public function products(){
        return $this->hasMany(products::class);
    }
}
