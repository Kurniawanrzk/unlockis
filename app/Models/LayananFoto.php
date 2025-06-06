<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananFoto extends Model
{
    use HasFactory;
    protected $table = 'layanan_foto';
    protected $primaryKey = "id_layanan_foto";
    protected $fillable = [
        "nama_layanan_foto",
        "slug",
        "deskripsi"
    ];

    public $timestamps = false;
}
