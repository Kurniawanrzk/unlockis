<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'pemesanan';

    // Kolom-kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'id_pelanggan',
        'total_harga',
        'catatan',
        'referensi',
        'total_orang_foto',
        'tanggal_booking',
        'jam_booking',
        'id_paket',
        'id_admin_verifikasi',
        'id_photographer',
        "status_pembayaran",
        "status_pengerjaan"
    ];

    // Jika 'id' menggunakan nama lain, misalnya 'id_pemesanan'
    protected $primaryKey = 'id_pemesanan';

    // Jika tidak menggunakan timestamps

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }
}
