<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('barangs')->insert([
            [
                'item_name' => 'Proyektor Epson',
                'item_image' => 'proyektor.jpg',
                'code_items' => 'ELEK001',
                'id_category' => 1, // pastikan kategori ini sudah ada
                'stock' => 5,
                'brand' => 'Epson',
                'status' => 'unused',
                'item_condition' => 'good',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'item_name' => 'Pulpen Pilot',
                'item_image' => null,
                'code_items' => 'ATK001',
                'id_category' => 2,
                'stock' => 50,
                'brand' => 'Pilot',
                'status' => 'unused',
                'item_condition' => 'good',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
