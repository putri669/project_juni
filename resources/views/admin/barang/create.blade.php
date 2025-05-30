@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="dashboard-header">Tambah Barang</h2>
    <form action="{{ route('admin.barang.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="item_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kode Barang</label>
            <input type="text" name="code_items" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Merk</label>
            <input type="text" name="brand" class="form-control">
        </div>
        <div class="mb-3">
            <label>Kondisi</label>
            <select name="item_condition" class="form-control" required>
                <option value="good">Baik</option>
                <option value="broken">Rusak</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="unused">Tersedia</option>
                <option value="used">Dipinjam</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <select name="id_category" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id_category }}">{{ $k->category_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="stock" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="item_image" class="form-control">
        </div>
        <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan</button>
        <a href="{{ route('admin.barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
