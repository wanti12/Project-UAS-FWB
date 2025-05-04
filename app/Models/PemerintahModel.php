<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemerintahModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_jabatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
