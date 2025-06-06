<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileSent extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'file_sent';

    // Kolom-kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'nama_file_sent',
        'harga_file_sent',
    ];

    // Jika 'id' menggunakan nama lain
    protected $primaryKey = 'id_file_sent';

    // Jika tidak menggunakan timestamps
    public $timestamps = false;
}
