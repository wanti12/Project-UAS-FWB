<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarModel extends Model
{
    use HasFactory;

    // Nama tabel jika tidak sesuai dengan konvensi Laravel (plural dari model)
    protected $table = 'komentars';

    // Kolom-kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'warga_id',
        'kegiatan_id',
        'komentar',
    ];

    // Relasi dengan tabel warga (setiap komentar dibuat oleh satu warga)
    public function warga()
    {
        return $this->belongsTo(WargaModel::class);
    }

    // Relasi dengan tabel kegiatan (setiap komentar diberikan pada satu kegiatan)
    public function kegiatan()
    {
        return $this->belongsTo(KegiatanModel::class);
    }
}
