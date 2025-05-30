@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="dashboard-header">Edit Barang</h2>
    <form action="{{ route('admin.barang.update', $barang->id_items) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="item_name" class="form-control" value="{{ $barang->item_name }}" required>
        </div>
        <div class="mb-3">
            <label>Kode Barang</label>
            <input type="text" name="code_items" class="form-control" value="{{ $barang->code_items }}" required>
        </div>
        <div class="mb-3">
            <label>Merk</label>
            <input type="text" name="brand" class="form-control" value="{{ $barang->brand }}">
        </div>
        <div class="mb-3">
            <label>Kondisi</label>
            <select name="item_condition" class="form-control" required>
                <option value="baik" {{ $barang->item_condition == 'baik' ? 'selected' : '' }}>Baik</option>
                <option value="rusak ringan" {{ $barang->item_condition == 'rusak ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                <option value="rusak berat" {{ $barang->item_condition == 'rusak berat' ? 'selected' : '' }}>Rusak Berat</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="tersedia" {{ $barang->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="dipinjam" {{ $barang->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <select name="id_category" class="form-control" required>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id_category }}" {{ $k->id_category == $barang->id_category ? 'selected' : '' }}>
                        {{ $k->category_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="stock" class="form-control" value="{{ $barang->stock }}" required>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="item_image" class="form-control">
            @if ($barang->item_image)
                <img src="{{ asset('storage/' . $barang->item_image) }}" alt="gambar" width="100" class="mt-2">
            @endif
        </div>
        <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-repeat"></i> Update</button>
        <a href="{{ route('admin.barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
