<?php

namespace Database\Seeders;

use App\Models\userModel;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        userModel::insert([
            [
                'email' => 'satu@gmail.com',
                'password' => bcrypt('123'),
                'role' => 'pemerintah'
            ],
            [
                'email' => 'dani@gmail.com',
                'password' => bcrypt('222'),
                'role' => 'pemerintah'
            ],
            [
                'email' => 'pia@gmail.com',
                'password' => bcrypt('333'),
                'role' => 'pemerintah'
            ],
        ]);
    }
}
