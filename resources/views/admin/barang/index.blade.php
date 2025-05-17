@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold" style="font-size: 20px;">
            📦 Daftar Barang
        </h2>
        <a href="{{ route('barang.create') }}" class="btn btn-primary d-flex align-items-center gap-2" style="font-size: 13px; padding: 6px 12px;">
            ➕ Tambah Barang
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-3" style="font-size: 13px;">
            @if($barang->isEmpty())
                <div class="alert alert-info text-center m-0" style="font-size: 13px;">
                    Belum ada barang yang tersedia.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered mb-0" style="font-size: 13px; border-radius: 8px; overflow: hidden;">
                        <thead style="background-color: #7895B2; color: white; font-size: 12.5px;">
                            <tr class="text-center">
                                <th class="py-2 px-3" style="width: 45px;">No</th>
                                <th class="py-2 px-3">Nama Barang</th>
                                <th class="py-2 px-3">Jumlah Barang</th>
                                <th class="py-2 px-3">Kategori</th>
                                <th class="py-2 px-3" style="width: 180px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barang as $index => $item)
                                <tr class="align-middle text-center" style="transition: background-color 0.2s;">
                                    <td class="py-2 px-3">{{ $index + 1 }}</td>
                                    <td class="py-2 px-3 text-start">{{ $item->nama }}</td>
                                    <td class="py-2 px-3">{{ $item->jumlah_barang }}</td>
                                    <td class="py-2 px-3">{{ $item->kategori->nama ?? '-' }}</td>
                                    <td class="py-2 px-3">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('barang.edit', $item->id) }}" 
                                               class="btn btn-warning btn-sm d-flex align-items-center gap-1" 
                                               style="border-radius: 6px; font-size: 12px; padding: 4px 10px;">
                                                ✏️ Edit
                                            </a>
                                            <form action="{{ route('barang.destroy', $item->id) }}" 
                                                  method="POST" 
                                                  class="d-inline" 
                                                  onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-danger btn-sm d-flex align-items-center gap-1" 
                                                        style="border-radius: 6px; font-size: 12px; padding: 4px 10px;">
                                                    🗑️ Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

{{-- Hover effect --}}
<style>
    tbody tr:hover {
        background-color: #f5f5f5;
    }
</style>
@endsection
