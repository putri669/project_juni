<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\DetailPengembalian;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
        public function index()
        {
                $databarang = Barang::count();
                 $peminjaman = Peminjaman::count();
                $pengembalian = DetailPengembalian::count();

                return view('admin.laporan.index', compact('databarang', 'peminjaman', 'pengembalian'));
        }

    // Tampilkan semua data barang
    public function barangIndex()
    {
        $barangs = Barang::with('category')->get();
        return view('admin.laporan.barang', compact('barangs'));
    }

    // Export data barang ke Excel
    public function exportBarangExcel()
    {
        $barangs = Barang::with('category')->get();
        return Excel::download(new \App\Exports\BarangExport($barangs), 'laporan_barang.xlsx');
    }

    // Export data barang ke PDF
    public function exportBarangPdf()
    {
        $barangs = Barang::with('category')->get();
        $pdf = Pdf::loadView('admin.laporan.barang_pdf', compact('barangs'));
        return $pdf->download('laporan_barang.pdf');
    }

    // Tampilkan data peminjaman
    public function peminjamanIndex()
    {
        $peminjaman = Peminjaman::with(['detailsBorrow.detailBarang', 'user'])
                        ->where('soft_delete', 0)->get();
        return view('admin.laporan.peminjaman', compact('peminjaman'));
    }

    // Export peminjaman ke Excel
    public function exportPeminjamanExcel()
    {
        $peminjaman = Peminjaman::with(['detailsBorrow.detailBarang', 'user'])
                        ->where('soft_delete', 0)->get();
        return Excel::download(new \App\Exports\PeminjamanExport($peminjaman), 'laporan_peminjaman.xlsx');
    }

    // Export peminjaman ke PDF
    public function exportPeminjamanPdf()
    {
        $peminjaman = Peminjaman::with(['detailsBorrow.detailBarang', 'user'])
                        ->where('soft_delete', 0)->get();
        $pdf = Pdf::loadView('admin.laporan.peminjaman_pdf', compact('peminjaman'));
        return $pdf->download('laporan_peminjaman.pdf');
    }

    // Tampilkan data pengembalian
    public function pengembalianIndex()
    {
        $pengembalian = DetailPengembalian::with('borrowed')->where('soft_delete', 0)->get();
        return view('admin.laporan.pengembalian', compact('pengembalian'));
    }

    // Export pengembalian ke Excel
    public function exportPengembalianExcel()
    {
        $pengembalian = DetailPengembalian::with('borrowed')->where('soft_delete', 0)->get();
        return Excel::download(new \App\Exports\PengembalianExport($pengembalian), 'laporan_pengembalian.xlsx');
    }

    // Export pengembalian ke PDF
    public function exportPengembalianPdf()
    {
        $pengembalian = DetailPengembalian::with('borrowed')->where('soft_delete', 0)->get();
        $pdf = Pdf::loadView('admin.laporan.pengembalian_pdf', compact('pengembalian'));
        return $pdf->download('laporan_pengembalian.pdf');
    }
}
