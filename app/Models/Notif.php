<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    use HasFactory;
    protected $table = 'penerima_notif';
    protected $primaryKey = 'id_penerima';
    protected $fillable = [
        "email"
    ];

    public $timestamps = false;
}
