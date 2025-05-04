<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanModel extends Model
{
    use HasFactory;

    // Nama tabel jika tidak sesuai dengan konvensi Laravel (plural dari model)
    protected $table = 'kegiatans';

    // Kolom-kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'nama_kegiatan',
        'tanggal',
        'deskripsi',
        'lokasi',
    ];

}
