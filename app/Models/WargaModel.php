<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WargaModel extends Model
{
    use HasFactory;

    // Nama tabel jika tidak sesuai dengan konvensi Laravel (plural dari model)
    protected $table = 'wargas';

    // Kolom-kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'user_id', // Relasi dengan user
        'nik',
        'nama',
        'alamat',
        'tanggal_lahir',
    ];

    // Relasi dengan tabel user (setiap warga memiliki satu user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
