<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfileModel extends Model
{

    use HasFactory;
    protected $table = 'user_profiles';
    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'no_hp',
        'bio'
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
}


