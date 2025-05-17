<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendaftaranModel extends Model
{
   use HasFactory;

    protected $table = 'pendaftaran_kegiatans';

    protected $fillable = [
        'kegiatan_id', 'warga_id', 'status_pendaftaran'
    ];

    public function kegiatan()
    {
        return $this->belongsTo(kegiatanModel::class);
    }

    public function warga()
    {
        return $this->belongsTo(userModel::class, 'warga_id');
    }
}
