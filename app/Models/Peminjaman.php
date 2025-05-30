<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'borroweds';
    protected $primaryKey = 'id_borrowed';
    protected $fillable = [
        'id_user',
        'id_details_borrow',
        'date_borrowed',
        'due_date',
        'status',
        'soft_delete',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Relasi ke Detail Borrow
    public function detailsBorrow()
    {
        return $this->belongsTo(DetailPeminjaman::class, 'id_details_borrow', 'id_details_borrow');
    }
}
