<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DetailPengembalianSeeder extends Seeder
{
    public function run()
    {
        DB::table('detail_pengembalians')->insert([
            [
                'id_borrowed' => 1,  // sesuaikan dengan data di tabel peminjaman
                'status' => 'approve',
                'return_image' => 'return_image_1.jpg',
                'description' => 'Barang dikembalikan dalam kondisi baik.',
                'soft_delete' => 0,
                'date_return' => Carbon::now()->subDays(2),
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'id_borrowed' => 2,
                'status' => 'not approve',
                'return_image' => 'return_image_2.jpg',
                'description' => 'Barang rusak saat dikembalikan.',
                'soft_delete' => 0,
                'date_return' => Carbon::now()->subDay(),
                'created_at' => Carbon::now()->subDay(),
                'updated_at' => Carbon::now()->subDay(),
            ],
        ]);
    }
}
