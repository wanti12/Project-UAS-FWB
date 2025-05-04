<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendaftaranModel extends Model
{
    use HasFactory;

    protected $table = 'pendaftarans';

   
    protected $fillable = [
        'warga_id',
        'kegiatan_id',
        'status',  
    ];

  
    public function warga()
    {
        return $this->belongsTo(WargaModel::class);
    }

   
    public function kegiatan()
    {
        return $this->belongsTo(KegiatanModel::class);
    }
}
