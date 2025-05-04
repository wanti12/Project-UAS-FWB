<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendaftaranModel extends Model
{
    use HasFactory;

    // Nama tabel jika tidak sesuai dengan konvensi Laravel (plural dari model)
    protected $table = 'pendaftarans';

    // Kolom-kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'warga_id',
        'kegiatan_id',
        'status',  // Misalnya status bisa 'terdaftar', 'dikonfirmasi', dll
    ];

    // Relasi dengan tabel warga (setiap pendaftaran terkait dengan satu warga)
    public function warga()
    {
        return $this->belongsTo(WargaModel::class);
    }

    // Relasi dengan tabel kegiatan (setiap pendaftaran terkait dengan satu kegiatan)
    public function kegiatan()
    {
        return $this->belongsTo(KegiatanModel::class);
    }
}
