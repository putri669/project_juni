<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PeminjamenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('peminjamen')->insert([
            [
                'id_user' => 1, // pastikan user ini ada
                'id_details_borrow' => 1,
                'status' => 'approved',
                'soft_delete' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 2,
                'id_details_borrow' => 2,
                'status' => 'pending',
                'soft_delete' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
