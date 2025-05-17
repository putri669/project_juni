<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index()
    {
        $databarang = Barang::count();
        $datakategori = Kategori::count();

        return view('admin.dashboard', compact('databarang', 'datakategori'));
    }
}
