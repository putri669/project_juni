@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="page-header text-center">Tambah Kategori Baru</h2>

    <div class="card p-4 shadow rounded">
        <form action="{{ route('admin.kategori.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="category_name" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
            </div>

            <div class="text-end">
                <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
