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
                'email' => 'admin1@gmail.com',
                'password' => bcrypt('123'),
                'role' => 'pemerintah'
            ],
            [
                'email' => 'admin@gmail.com',
                'password' => bcrypt('234'),
                'role' => 'pemerintah'
            ],
            [
                'email' => 'admin3@gmail.com',
                'password' => bcrypt('345'),
                'role' => 'pemerintah'
            ],
            [
                'email' => 'pemerintah1@gmail.com',
                'password' => bcrypt('pemerintah1'),
                'role' => 'pemerintah'
            ],
        ]);
    }
}
