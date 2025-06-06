<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'pelanggan';

    // Kolom-kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'nama_lengkap',
        'no_wa',
        'no_rekening',
        'nama_bank',
        'instagram',
        'foto_kartu_member',
        'member_id',
    ];

    // Jika 'id' menggunakan nama lain
    protected $primaryKey = 'id_pelanggan';

    // Jika tidak menggunakan timestamps
    public $timestamps = false;
    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_pelanggan');
    }
}
