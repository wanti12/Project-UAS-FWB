<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuanModel extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_penyelenggaras';

    protected $fillable = [
        'kegiatan_id', 'penyelenggara_id', 'status_pengajuan', 'tanggal_pengajuan'
    ];

    public function kegiatan()
    {
        return $this->belongsTo(kegiatanModel::class);
    }

    public function penyelenggara()
    {
        return $this->belongsTo(userModel::class, 'penyelenggara_id');
    }
}