<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kegiatanModel extends Model
{
   use HasFactory;

    protected $fillable = [
        'judul', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'lokasi', 'dibuat_oleh', 'status'
    ];

    public function pembuat()
    {
        return $this->belongsTo(userModel::class, 'dibuat_oleh');
    }

    public function komentars()
    {
        return $this->hasMany(komentarModel::class);
    }

    public function pendaftarans()
    {
        return $this->hasMany(pendaftaranModel::class);
    }

    
}