<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_items';
    protected $fillable = [
        'item_name',
        'item_image',
        'code_items',
        'id_category',
        'stock',
        'brand',
        'status',
        'item_condition'
    ];

    public function category()
    {
        return $this->belongsTo(Kategori::class, 'id_category', 'id_category');
    }

    public function detailsBorrow()
    {
        return $this->hasMany(DetailPengembalian::class, 'id_items', 'id_items');
    }
}

