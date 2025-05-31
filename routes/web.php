<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\StockBarangController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BorrowedController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PengembalianController;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login.form');
Route::post('/login', [AuthController::class, 'loginweb'])->name('auth.login.submit');

// Grup route admin yang hanya bisa diakses oleh admin yang login
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // =====================
    // KATEGORI
    // =====================
    Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('admin.kategori.store');
    Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('admin.kategori.update');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');

    // =====================
    // BARANG
    // =====================
    Route::get('/barang', [BarangController::class, 'index'])->name('admin.barang.index');
    Route::get('/barang/create', [BarangController::class, 'create'])->name('admin.barang.create');
    Route::post('/barang', [BarangController::class, 'store'])->name('admin.barang.store');
    Route::get('/barang/{id}', [BarangController::class, 'show'])->name('admin.barang.show');
    Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('admin.barang.edit');
    Route::put('/barang/{id}', [BarangController::class, 'update'])->name('admin.barang.update');
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('admin.barang.destroy');

    // =====================
    // STOK BARANG
    // =====================
    Route::get('/stok-barang', [StockBarangController::class, 'index'])->name('admin.stock.index');
    Route::get('/stock-barang/create', [StockBarangController::class, 'create'])->name('admin.stock.create');
    Route::post('/stock-barang', [StockBarangController::class, 'store'])->name('admin.stock.store');
    Route::get('/stock-barang/{id}/edit', [StockBarangController::class, 'edit'])->name('admin.stock.edit');
    Route::put('/stock-barang/{id}', [StockBarangController::class, 'update'])->name('admin.stock.update');
    Route::delete('/stock-barang/{id}', [StockBarangController::class, 'destroy'])->name('admin.stock.destroy');

    // =====================
    // USER
    // =====================
    Route::get('/user', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/user', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/user/{id_user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/user/{id_user}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/user/{id_user}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    // =====================
    // PEMINJAMAN
    // =====================
    Route::get('/peminjaman', [BorrowedController::class, 'index'])->name('admin.peminjaman.index');
    Route::get('/peminjaman/{id}', [BorrowedController::class, 'show'])->name('admin.peminjaman.show');
    Route::post('/peminjaman/{id}/approve', [BorrowedController::class, 'approve'])->name('admin.peminjaman.approve');
    Route::post('/peminjaman/{id}/reject', [BorrowedController::class, 'reject'])->name('admin.peminjaman.reject');

    // =====================
    // PENGEMBALIAN
    // =====================
    Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('admin.pengembalian.index');
    Route::get('/pengembalian/{id}', [PengembalianController::class, 'show'])->name('admin.pengembalian.show');
    Route::post('/pengembalian/{id}/approve', [PengembalianController::class, 'approve'])->name('admin.pengembalian.approve');
    Route::post('/pengembalian/{id}/reject', [PengembalianController::class, 'reject'])->name('admin.pengembalian.reject');

    Route::prefix('admin/laporan')->middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('/laporan', [LaporanController::class, 'index'])->name('admin.laporan.index');

    Route::get('barang', [LaporanController::class, 'barangIndex']);
    Route::get('barang/export/excel', [LaporanController::class, 'exportBarangExcel']);
    Route::get('barang/export/pdf', [LaporanController::class, 'exportBarangPdf']);

    // Peminjaman
    Route::get('peminjaman', [LaporanController::class, 'peminjamanIndex']);
    Route::get('peminjaman/export/excel', [LaporanController::class, 'exportPeminjamanExcel']);
    Route::get('peminjaman/export/pdf', [LaporanController::class, 'exportPeminjamanPdf']);

    // Pengembalian
    Route::get('pengembalian', [LaporanController::class, 'pengembalianIndex']);
    Route::get('pengembalian/export/excel', [LaporanController::class, 'exportPengembalianExcel']);
    Route::get('pengembalian/export/pdf', [LaporanController::class, 'exportPengembalianPdf']);
});
});

Route::delete('/logout',[AuthController::class, 'logout'])->name('logout');