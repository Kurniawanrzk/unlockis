<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananBackground extends Model
{
    use HasFactory;
     // Nama tabel
     protected $primaryKey = "id_pemesanan_bg";
     protected $table = 'pemesanan_background';

     // Kolom-kolom yang bisa diisi (mass assignable)
     protected $fillable = [
         'id_pemesanan',
         'id_background',
     ];
     // Jika tidak menggunakan timestamps
     public $timestamps = false;
}
