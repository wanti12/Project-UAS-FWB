<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
use HasFactory, Notifiable;


protected $table = 'users';

    protected $fillable = [
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne(UserProfileModel::class, 'user_id');
    }

    public function kegiatanDibuat()
    {
        return $this->hasMany(kegiatanModel::class, 'dibuat_oleh');
    }


    public function pendaftarans()
    {
        return $this->hasMany(pendaftaranModel::class, 'warga_id');
    }

    
}