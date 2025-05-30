@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@section('content')
<style>
    .form-container {
        background: #fff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 2px 10px rgb(0 0 0 / 0.1);
        max-width: 600px;
        margin: 2rem auto;
    }
</style>

<div class="container py-5">
    <h2 class="dashboard-header text-center">Tambah User Baru</h2>

    <div class="form-container">
        <form action="{{ route('admin.user.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" required>
                    <option value="" disabled selected>-- Pilih Role --</option>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="class" class="form-label">Kelas</label>
                <select name="class" id="class" class="form-select @error('class') is-invalid @enderror">
                    <option value="" disabled selected>-- Pilih Kelas --</option>
                    @foreach(['X', 'XI', 'XII', 'ANON'] as $kelas)
                    <option value="{{ $kelas }}" {{ old('class') == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                    @endforeach
                </select>
                @error('class')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label for="major" class="form-label">Jurusan</label>
                <select name="major" id="major" class="form-select @error('major') is-invalid @enderror">
                    <option value="" disabled selected>-- Pilih Jurusan --</option>
                    @foreach(['RPL', 'PSPT', 'ANIMASI', 'TJKT', 'TE'] as $jurusan)
                    <option value="{{ $jurusan }}" {{ old('major') == $jurusan ? 'selected' : '' }}>{{ $jurusan }}</option>
                    @endforeach
                </select>
                @error('major')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
