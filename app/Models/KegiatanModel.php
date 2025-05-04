<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanModel extends Model
{
    use HasFactory;

    
    protected $table = 'kegiatans';

    
    protected $fillable = [
        'nama_kegiatan',
        'tanggal',
        'deskripsi',
        'lokasi',
    ];

    public function pendaftarans()
    {
        return $this->hasMany(pendaftaranModel::class);
    }

}
