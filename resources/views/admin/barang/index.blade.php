@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="dashboard-header">Data Barang</h2>
    <div class="mb-4 text-end">
        <a href="{{ route('admin.barang.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah Barang
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered align-middle table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kode</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Merk</th>
                    <th>Status</th>
                    <th>Kondisi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barang as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->code_items }}</td>
                        <td>{{ $item->category->category_name ?? '-' }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>{{ $item->brand }}</td>
                        <td>{{ ucfirst($item->status) }}</td>
                        <td>{{ ucfirst($item->item_condition) }}</td>
                        <td>
                            @if ($item->item_image)
                                <img src="{{ asset('storage/' . $item->item_image) }}" alt="gambar" width="60">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.barang.edit', $item->id_items) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.barang.destroy', $item->id_items) }}" method="POST"
                                style="display:inline-block;" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center">Belum ada data barang.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
