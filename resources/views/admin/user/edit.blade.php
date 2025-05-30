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
    <h2 class="dashboard-header text-center">Edit User</h2>

    <div class="form-container">
        <form action="{{ route('admin.user.update', $user->id_user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <!-- Password kosong berarti tidak diubah -->
            <div class="mb-3">
                <label for="password" class="form-label">Password <small class="text-muted">(Kosongkan jika tidak ingin diubah)</small></label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password">
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" required>
                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="class" class="form-label">Kelas</label>
                <select name="class" id="class" class="form-select @error('class') is-invalid @enderror">
                    <option value="" disabled>-- Pilih Kelas --</option>
                    @foreach(['X', 'XI', 'XII', 'ANON'] as $kelas)
                    <option value="{{ $kelas }}" {{ old('class', $user->class) == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                    @endforeach
                </select>
                @error('class')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label for="major" class="form-label">Jurusan</label>
                <select name="major" id="major" class="form-select @error('major') is-invalid @enderror">
                    <option value="" disabled>-- Pilih Jurusan --</option>
                    @foreach(['RPL', 'PSPT', 'ANIMASI', 'TJKT', 'TE'] as $jurusan)
                    <option value="{{ $jurusan }}" {{ old('major', $user->major) == $jurusan ? 'selected' : '' }}>{{ $jurusan }}</option>
                    @endforeach
                </select>
                @error('major')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
