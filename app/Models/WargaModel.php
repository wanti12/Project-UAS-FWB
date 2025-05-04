<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WargaModel extends Model
{
    use HasFactory;


    protected $table = 'wargas';

    
    protected $fillable = [
        'user_id', 
        'nik',
        'nama',
        'alamat',
        'tanggal_lahir',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
