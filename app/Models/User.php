<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    protected $table = 'user';
    protected $fillable = [
        'nama',
        "username",
        "id_role",
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = false;
    protected $primaryKey = 'id_user';
}
