<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris';

    protected $primaryKey = 'id_category';

    protected $fillable = ['category_name'];

    public function items()
    {
        return $this->hasMany(Barang::class, 'id_category', 'id_category');
    }
}
