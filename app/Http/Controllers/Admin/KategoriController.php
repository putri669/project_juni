<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriReq;
use App\Models\Kategori;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KategoriController extends Controller
{
    public function index(): View
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    public function create(): View
    {
        return view('admin.kategori.create');
    }

    public function store(KategoriReq $request): RedirectResponse
    {
        Kategori::create($request->validated());

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id): View
    {
        // Cari berdasarkan primary key id_category
        $kategori = Kategori::where('id_category', $id)->firstOrFail();

        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(KategoriReq $request, $id): RedirectResponse
    {
        $kategori = Kategori::where('id_category', $id)->first();

        if (!$kategori) {
            return redirect()->route('admin.kategori.index')
                ->with('error', 'Data tidak ditemukan.');
        }

        $kategori->update($request->validated());

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id): RedirectResponse
    {
        $kategori = Kategori::where('id_category', $id)->first();

        if (!$kategori) {
            return redirect()->route('admin.kategori.index')
                ->with('error', "Data dengan id {$id} tidak ditemukan.");
        }

        $kategori->delete();

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
