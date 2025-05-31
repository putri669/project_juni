@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@section('content')
    <style>
        /* Global Styles */
        .dashboard-header {
            font-weight: 600;
            font-size: 1.5rem;
            margin-bottom: 2rem;
            color: #2c3e50;
            text-align: center;
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 1.5rem;
            padding: 0 1rem;
        }

        .dashboard-card {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            position: relative;
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        .dashboard-card .icon-bg {
            position: absolute;
            top: -25px;
            right: -25px;
            font-size: 4rem;
            color: rgba(100, 100, 255, 0.15);
            z-index: 0;
        }

        .dashboard-card h3 {
            font-size: 1.2rem;
            color: #34495e;
            margin-bottom: 0.5rem;
            z-index: 1;
            position: relative;
        }

        .dashboard-card .count {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2d3436;
            z-index: 1;
            position: relative;
        }

        /* Individual Card Color Styling */
        .dashboard-card.barang {
            border-left: 5px solid #3498db;
        }

        .dashboard-card.kategori {
            border-left: 5px solid #e74c3c;
        }

        .dashboard-card.users {
            border-left: 5px solid #9b59b6;
        }

        .dashboard-card.ruangan {
            border-left: 5px solid #2ecc71;
        }
    </style>

    <div class="container py-5">
        <h2 class="dashboard-header">Welcome to Your Dashboard</h2>
        <div class="dashboard-cards">
            <!-- Data Barang -->
            <a href="{{ route('admin.barang.index') }}" class="dashboard-card barang">
                <span class="icon-bg"><i class="bi bi-box"></i></span>
                <h3>Data Barang</h3>
                <span class="count">{{ $databarang }}</span>
            </a>

            <!-- Kategori Barang -->
            <a href="{{ route('admin.kategori.index') }}" class="dashboard-card kategori">
                <span class="icon-bg"><i class="bi bi-tags"></i></span>
                <h3>Kategori Barang</h3>
                <span class="count">{{ $datakategori }}</span>
            </a>

            <!-- Users -->
            <div class="dashboard-card users">
                <span class="icon-bg"><i class="bi bi-people"></i></span>
                <h3>Users</h3>
                <span class="count">{{ $user }}</span>
            </div>

            <!-- Ruangan -->
            <div class="dashboard-card ruangan">
                <span class="icon-bg"><i class="bi bi-building"></i></span>
                <h3>Total Peminjaman</h3>
                <span class="count">{{ $peminjaman }}</span>
            </div>
        </div>
    </div>
@endsection
