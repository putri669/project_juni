<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $databarang = Barang::count();
        $datakategori = Kategori::count();
        $user = User::count();
        $peminjaman = Peminjaman::where('status', 'approved')->count();

        return view('admin.dashboard', compact('databarang', 'datakategori', 'user', 'peminjaman'));
    }
}
