@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@section('content')
<style>
    .container {
        max-width: 900px;
        margin: 40px auto;
    }
    h2 {
        text-align: center;
        margin-bottom: 2rem;
        font-weight: 700;
        color: #2c3e50;
    }
    .card-wrapper {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
        justify-content: center;
    }
    .card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        padding: 2rem 1.5rem;
        flex: 1 1 260px;
        position: relative;
        text-align: center;
        transition: box-shadow 0.3s ease;
    }
    .card:hover {
        box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    }
    .card .icon {
        font-size: 4rem;
        color: #3498db;
        opacity: 0.15;
        position: absolute;
        top: 15px;
        right: 15px;
    }
    .card h3 {
        font-size: 1.4rem;
        margin-bottom: 1rem;
        color: #34495e;
        position: relative;
        z-index: 1;
    }
    .count {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: #2d3436;
        position: relative;
        z-index: 1;
    }
    .btn-group {
        display: flex;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
    }
    .btn-group a {
        text-decoration: none;
        padding: 0.5rem 1.2rem;
        border-radius: 6px;
        font-weight: 600;
        color: white;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        font-size: 0.9rem;
        transition: background-color 0.3s ease;
        position: relative;
        z-index: 1;
    }
    .btn-pdf {
        background-color: #e74c3c;
    }
    .btn-pdf:hover {
        background-color: #c0392b;
    }
    .btn-excel {
        background-color: #27ae60;
    }
    .btn-excel:hover {
        background-color: #1e8449;
    }
</style>

<div class="container">
    <h2>Laporan Data Barang, Peminjaman & Pengembalian</h2>

    <div class="card-wrapper">

        <!-- CARD: Barang -->
        <div class="card">
            <i class="bi bi-box icon"></i>
            <h3>Data Barang</h3>
            <div class="count">{{ $databarang }}</div>
            <div class="btn-group">
                <a href="{{ url('admin/laporan/barang/export/pdf') }}" target="_blank" class="btn-pdf">
                    <i class="bi bi-file-earmark-pdf"></i> Export PDF
                </a>
                <a href="{{ url('admin/laporan/barang/export/excel') }}" target="_blank" class="btn-excel">
                    <i class="bi bi-file-earmark-excel"></i> Export Excel
                </a>
            </div>
        </div>

        <!-- CARD: Peminjaman -->
        <div class="card">
            <i class="bi bi-box-arrow-in-right icon"></i>
            <h3>Data Peminjaman </h3>
            <div class="count">{{ $peminjaman }}</div>
            <div class="btn-group">
                <a href="{{ url('admin/laporan/peminjaman/export/pdf') }}" target="_blank" class="btn-pdf">
                    <i class="bi bi-file-earmark-pdf"></i> Export PDF
                </a>
                <a href="{{ url('admin/laporan/peminjaman/export/excel') }}" target="_blank" class="btn-excel">
                    <i class="bi bi-file-earmark-excel"></i> Export Excel
                </a>
            </div>
        </div>

        <!-- CARD: Pengembalian -->
        <div class="card">
            <i class="bi bi-box-arrow-in-left icon"></i>
            <h3>Data Pengembalian</h3>
            <div class="count">{{ $pengembalian }}</div>
            <div class="btn-group">
                <a href="{{ url('admin/laporan/pengembalian/export/pdf') }}" target="_blank" class="btn-pdf">
                    <i class="bi bi-file-earmark-pdf"></i> Export PDF
                </a>
                <a href="{{ url('admin/laporan/pengembalian/export/excel') }}" target="_blank" class="btn-excel">
                    <i class="bi bi-file-earmark-excel"></i> Export Excel
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
