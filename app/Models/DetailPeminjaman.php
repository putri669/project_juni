<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    use HasFactory;

    protected $table = 'detail_peminjamen';
    protected $primaryKey = 'id_details_borrow';
    protected $fillable = [
        'id_items',
        'amount',
        'used_for',
        'class',
        'date_borrowed',
        'due_date',
    ];

    public function detailBarang()
    {
        return $this->belongsTo(Barang::class, 'id_items', 'id_items');
    }

    // Relasi ke borroweds
    public function borrowed()
    {
        return $this->hasOne(Peminjaman::class, 'id_details_borrow');
    }
}
