<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailLayananFoto extends Model
{
    use HasFactory;
    protected $table = 'layanan_detail_foto';
    protected $primaryKey = "id_detail_layanan_foto";
    protected $fillable = [
        "gambar",
        "id_layanan_foto"
    ];

    public $timestamps = false;
}
