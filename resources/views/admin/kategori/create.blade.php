@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4" style="font-weight: 600; color: #37474f; font-size: 24px;">➕ Tambah Kategori</h1>

    <div style="background: white; padding: 25px; border-radius: 10px; box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05); max-width: 550px; margin: auto;">
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="nama" style="font-weight: 500; font-size: 14px; margin-bottom: 6px; display: block; color: #546e7a;">Nama Kategori</label>
                <input type="text" 
                       name="nama" 
                       id="nama" 
                       class="form-control" 
                       placeholder="Masukkan nama kategori"
                       style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #cfd8dc; background-color: #f9f9f9; font-size: 14px;"
                       required>
            </div>

            <div style="display: flex; gap: 8px; margin-top: 20px;">
                <button type="submit" 
                        style="background: linear-gradient(to right, #66bb6a, #43a047); 
                               color: white; 
                               padding: 8px 16px; 
                               border: none; 
                               border-radius: 8px; 
                               font-weight: 500; 
                               font-size: 14px;
                               cursor: pointer; 
                               transition: background 0.3s;">
                    💾 Simpan
                </button>

                <a href="{{ route('kategori.index') }}" 
                   style="background: linear-gradient(to right, #b0bec5, #90a4ae); 
                          color: white; 
                          padding: 8px 16px; 
                          border-radius: 8px; 
                          font-weight: 500; 
                          font-size: 14px;
                          text-decoration: none; 
                          display: inline-flex; 
                          align-items: center;">
                    ❌ Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
