@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@section('content')
<style>
    .dashboard-header {
        font-weight: 600;
        font-size: 1.5rem;
        margin-bottom: 2rem;
        color: #2c3e50;
        text-align: center;
    }

    .dashboard-cards {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
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

    .dashboard-card h4 {
        font-size: 1.1rem;
        color: #34495e;
        margin-bottom: 0.5rem;
        z-index: 1;
        position: relative;
    }

    .dashboard-card .info {
        font-size: 0.9rem;
        margin-bottom: 1rem;
        color: #2d3436;
    }

    .dashboard-card .actions {
        display: flex;
        gap: 10px;
    }

    .btn-approve {
        background-color: #2ecc71;
        color: white;
    }

    .btn-reject {
        background-color: #e74c3c;
        color: white;
    }
</style>

<div class="container py-5">
    <h2 class="dashboard-header">Daftar Peminjaman</h2>

    <div class="dashboard-cards">
        @forelse ($peminjaman as $item)
            <div class="dashboard-card">
                <span class="icon-bg"><i class="bi bi-clipboard-check"></i></span>
                <h4>{{ $item->user->name }}</h4>

                <div class="info">
                    <strong>Barang:</strong>
                    <ul class="mb-1">
                        @forelse ($item->detailsBorrow as $barang)
                        <li>
                            {{ optional($barang->detailBarang)->item_name ?? 'Detail barang tidak ditemukan' }}
                            ({{ optional($barang->detailBarang)->stock ?? '-' }})
                        </li>
                    @empty
                        <li><em>Tidak ada detail barang</em></li>
                    @endforelse
                    </ul>

                    <strong>Status:</strong> {{ ucfirst($item->status) }}<br>

                    @php
                        $firstDetail = $item->detailsBorrow->first();
                    @endphp
                    <strong>Tanggal Pinjam:</strong> {{ $firstDetail?->tanggal_pinjam ?? '-' }}<br>
                    <strong>Tanggal Kembali:</strong> {{ $firstDetail?->tanggal_kembali ?? '-' }}
                </div>

                <div class="actions">
                    <form action="{{ route('admin.peminjaman.approve', $item->id_borrowed) }}" method="POST" onsubmit="this.querySelector('button').disabled = true; this.style.display='none';">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-approve">
                            <i class="bi bi-check-circle"></i> Approve
                        </button>
                    </form>

                    <form action="{{ route('admin.peminjaman.reject', $item->id_borrowed) }}" method="POST" onsubmit="this.querySelector('button').disabled = true; this.style.display='none';">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-reject">
                            <i class="bi bi-x-circle"></i> Reject
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-center">Tidak ada permintaan peminjaman.</p>
        @endforelse
    </div>
</div>
@endsection
