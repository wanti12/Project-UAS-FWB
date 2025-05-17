<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'kegiatan_id', 'user_id', 'komentar'
    ];

    public function kegiatan()
    {
        return $this->belongsTo(kegiatanModel::class);
    }

    public function user()
    {
        return $this->belongsTo(userModel::class);
    }
}