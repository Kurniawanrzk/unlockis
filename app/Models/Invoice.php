<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoice';
    protected $primaryKey = "uuid";
    protected $keyType = 'string';

    protected $fillable = [
        "id_pemesanan"
    ];

    public $timestamps = false;
}
