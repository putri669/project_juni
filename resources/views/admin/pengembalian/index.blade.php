@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@section('content')
<style>
    .header {
        font-weight: 600;
        font-size: 1.5rem;
        margin-bottom: 2rem;
        color: #2c3e50;
        text-align: center;
    }

    .card-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 1.5rem;
        padding: 0 1rem;
    }

    .card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        padding: 20px;
        position: relative;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.15);
    }

    .card h4 {
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
        color: #34495e;
    }

    .card .info {
        font-size: 0.9rem;
        margin-bottom: 1rem;
        color: #2d3436;
    }

    .actions {
        display: flex;
        gap: 10px;
    }

    .btn-approve {
        background-color: #2ecc71;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-reject {
        background-color: #e74c3c;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 5px;
        cursor: pointer;
    }

    .return-image {
        width: 100%;
        max-height: 180px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 10px;
    }
</style>

<div class="container py-5">
    <h2 class="header">Daftar Pengembalian</h2>

    @if ($returns->isEmpty())
        <p class="text-center">Tidak ada data pengembalian.</p>
    @else
        <div class="card-list">
            @foreach ($returns as $return)
                <div class="card">
                    <h4>{{ $return->borrowed->user->name ?? 'User tidak ditemukan' }}</h4>

                    <img src="{{ asset('storage/' . $return->return_image) }}" alt="Return Image" class="return-image">

                    <div class="info">
                        <strong>Status:</strong> <em>{{ ucfirst($return->status) }}</em><br>
                        <strong>Deskripsi:</strong> {{ $return->description }}<br>
                        <strong>Tanggal Kembali:</strong> {{ \Carbon\Carbon::parse($return->date_return)->format('d-m-Y H:i') }}
                    </div>

                    <div class="actions">
                        @if ($return->status == 'pending')
                            <form action="{{ route('admin.pengembalian.approve', $return->id_detail_return) }}" method="POST" onsubmit="this.querySelector('button').disabled=true;">
                                @csrf
                                <button type="submit" class="btn-approve">
                                    <i class="bi bi-check-circle"></i> Approve
                                </button>
                            </form>

                            <form action="{{ route('admin.pengembalian.reject', $return->id_detail_return) }}" method="POST" onsubmit="this.querySelector('button').disabled=true;">
                                @csrf
                                <button type="submit" class="btn-reject">
                                    <i class="bi bi-x-circle"></i> Reject
                                </button>
                            </form>
                        @else
                            <span>Status sudah {{ ucfirst($return->status) }}</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
