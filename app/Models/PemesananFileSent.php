<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananFileSent extends Model
{
    use HasFactory;
     // Nama tabel
     protected $table = 'pemesanan_file_sent';

     // Kolom-kolom yang bisa diisi (mass assignable)
     protected $fillable = [
         'id_pemesanan',
         'id_file_sent',
     ];
     // Jika tidak menggunakan timestamps
     public $timestamps = false;
}
