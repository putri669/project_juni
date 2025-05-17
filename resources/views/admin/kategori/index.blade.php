@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4" style="font-weight: 700; color: #37474f; font-size: 20px;">📂 Daftar Kategori</h1>

    <div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
        <a href="{{ route('kategori.create') }}" 
           style="background: linear-gradient(to right, #64b5f6, #42a5f5); 
                  color: white; 
                  padding: 8px 16px; 
                  border-radius: 8px; 
                  text-decoration: none; 
                  font-weight: 600;
                  font-size: 14px;
                  transition: background 0.3s;">
            ➕ Tambah Kategori
        </a>
    </div>

    <div style="overflow-x:auto; background: white; padding: 20px; border-radius: 12px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05); font-size: 14px;">
        <table class="table" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #8ba2b5; color: white; font-size: 13px;">
                    <th style="padding: 12px;">No</th>
                    <th style="padding: 12px;">Nama Kategori</th>
                    <th style="padding: 12px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategoris as $index => $kategori)
                <tr style="border-bottom: 1px solid #ddd; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#f1f9ff';" onmouseout="this.style.backgroundColor='white';">
                    <td style="padding: 10px; text-align: center;">{{ $index + 1 }}</td>
                    <td style="padding: 10px;">{{ $kategori->nama }}</td>
                    <td style="padding: 10px; text-align: center;">
                        <div style="display: inline-flex; gap: 6px;">
                            <a href="{{ route('kategori.edit', $kategori->id) }}" 
                               style="background: linear-gradient(to right, #ffb74d, #ffa726); 
                                      color: white; 
                                      padding: 6px 12px; 
                                      border-radius: 6px; 
                                      font-weight: 600;
                                      font-size: 13px;
                                      text-decoration: none;">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('kategori.destroy', $kategori->id) }}" 
                                  method="POST" 
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus kategori ini?')"
                                        style="background: linear-gradient(to right, #e57373, #ef5350); 
                                               color: white; 
                                               padding: 6px 12px; 
                                               border: none; 
                                               border-radius: 6px; 
                                               font-weight: 600;
                                               font-size: 13px;
                                               cursor: pointer;">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" style="padding: 18px; text-align: center; font-size: 13px;">Belum ada kategori.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
