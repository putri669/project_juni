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
        ]);
        DB::table('users')->insert([
            [
                'name' => 'test1',
                'email' => 'example1@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'admin',
                'class' => 'X',
                'major' => 'RPL',
            ],
        ]);
    }
}
