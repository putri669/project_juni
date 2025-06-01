<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;   

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';
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
        return $this->belongsTo(Kategori::class, 'id_category');
    }
}

