<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServisTambahan extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'servis_tambahan';

    // Kolom-kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'nama_servis',
        'harga_servis',
        'key'
    ];

    // Jika 'id' menggunakan nama lain
    protected $primaryKey = 'id_servis';

    // Jika tidak menggunakan timestamps
    public $timestamps = false;
}
