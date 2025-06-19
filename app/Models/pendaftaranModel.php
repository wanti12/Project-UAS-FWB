<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class pendaftaranModel extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_kegiatans';

    protected $fillable = [
        'kegiatan_id',
        'warga_id',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(kegiatanModel::class, 'kegiatan_id');
    }

    public function warga()
    {
        return $this->belongsTo(UserModel::class, 'warga_id');
    }

    
}
