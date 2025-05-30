<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'test',
                'email' => 'example@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'user',
                'class' => 'X',
                'major' => 'RPL',
            ],
            [
                'name' => 'admin',
                'email' => 'example2@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'class' => 'XI',
                'major' => 'RPL',
            ],
        ]);
    }
}
