<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServisTambahanPemesanan extends Model
{
    use HasFactory;
        // Nama tabel
        protected $table = 'servis_tambahan_pemesanan';

        // Kolom-kolom yang bisa diisi (mass assignable)
        protected $fillable = [
            'id_pemesanan',
            'id_servis',
        ];
        // Jika tidak menggunakan timestamps
        public $timestamps = false;
}
