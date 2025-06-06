<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'background';

    // Kolom-kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'nama_background',
        'kapasitas_min',
        'kapasitas_max',
        'status',
        'gambar_bg'
    ];

    // Jika 'id' menggunakan nama lain
    protected $primaryKey = 'id_background';

    // Jika tidak menggunakan timestamps
    public $timestamps = false;
}
