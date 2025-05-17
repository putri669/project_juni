<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\StockBarangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard & admin routes
Route::prefix('admin')->group(function() {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Kategori
    Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::get('kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show');
    Route::put('kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::get('kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::delete('kategori/{id}/delete', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    // Barang
    Route::get('barang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('barang', [BarangController::class, 'store'])->name('barang.store');
    Route::get('barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::delete('barang/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy'); 
    Route::put('barang/{barang}', [BarangController::class, 'update'])->name('barang.update');

    // Stock Barang
    Route::get('stock', [StockBarangController::class, 'index'])->name('stock.index');
    Route::get('stock/create', [StockBarangController::class, 'create'])->name('stock.create');
    Route::post('stock/store', [StockBarangController::class, 'store'])->name('stock.store');
    Route::get('stock/edit/{id}', [StockBarangController::class, 'edit'])->name('stock.edit');
    Route::put('stock/update/{id}', [StockBarangController::class, 'update'])->name('stock.update');
    Route::delete('stock/destroy/{id}', [StockBarangController::class, 'destroy'])->name('stock.destroy');
});

// User route (jika diperlukan)
Route::get('/user', function () {
    return ('user');
})->middleware(['auth', 'role:user'])->name('user.dashboard');


// Route::get('/admin/dashboard',[Dashboard::class, 'index']) ->name('admin.dashboard');
