<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananTerbayar extends Model
{
    use HasFactory;
     // Nama tabel
     protected $table = 'pemesanan_terbayar';

     // Kolom-kolom yang bisa diisi (mass assignable)
     protected $fillable = [
         'id_pemesanan',
     ];

     protected $primaryKey = "id_pemesanan_terbayar";
     // Jika tidak menggunakan timestamps
     public $timestamps = false;
}
