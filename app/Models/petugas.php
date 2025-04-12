<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari nama model
    protected $table = 'petugas';

    // Tentukan kolom-kolom yang dapat diisi (fillable) untuk mencegah mass-assignment vulnerability
    protected $fillable = [
        'nama',
        'no_telepon',
        'alamat',
        'username',
        'role',
        'password',
    ];



    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

}
