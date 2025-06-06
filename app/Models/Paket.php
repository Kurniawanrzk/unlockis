<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'paket_foto';

    // Kolom-kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'nama_paket',
        'deskripsi',
        'harga',
        'id_layanan_foto',
        'tipe_paket',
        'durasi_pemotretan'
    ];

    // Jika 'id' menggunakan nama lain
    protected $primaryKey = 'id_paket';

    // Jika tidak menggunakan timestamps
    public $timestamps = false;
    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_pelanggan');
    }
}
