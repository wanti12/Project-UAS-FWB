<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class userModel extends Model
{
use HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'password',
        'role',
    ];

    public function profile()
    {
        return $this->hasOne(UserProfileModel::class);
    }

    public function kegiatanDibuat()
    {
        return $this->hasMany(kegiatanModel::class, 'dibuat_oleh');
    }

    public function komentars()
    {
        return $this->hasMany(komentarModel::class);
    }

    public function pendaftarans()
    {
        return $this->hasMany(pendaftaranModel::class, 'warga_id');
    }

    public function pengajuanPenyelenggara()
    {
        return $this->hasMany(pengajuanModel::class, 'penyelenggara_id');
    }
}