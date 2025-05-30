<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DetailPeminjamenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('detail_peminjamen')->insert([
            [
                'id_items' => 1, // pastikan item ini ada di tabel barangs
                'amount' => 5,
                'used_for' => 'Praktikum Fisika',
                'class' => 'XII IPA 1',
                'date_borrowed' => Carbon::now(),
                'due_date' => Carbon::now()->addDays(7),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_items' => 2,
                'amount' => 2,
                'used_for' => 'Proyek Sains',
                'class' => 'XI IPA 2',
                'date_borrowed' => Carbon::now(),
                'due_date' => Carbon::now()->addDays(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
