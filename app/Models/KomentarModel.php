<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarModel extends Model
{
    use HasFactory;

    
    protected $table = 'komentars';

    
    protected $fillable = [
        'warga_id',
        'kegiatan_id',
        'komentar',
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
