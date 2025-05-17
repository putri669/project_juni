<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('admin.kategori.index', compact('kategoris'));
    }

    // nambah ini
    public function show(int $id) {
        $kategori = Kategori::query()->find($id);
        // create new file show
        return view('admin.kategori.show', compact('kategori'));
    }


    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Kategori::create([
            'nama' => $request->nama,
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil dibuat.');
    }

    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route("kategori.index")->with('success', 'Kategori berhasil diupdate.');
    }

    public function destroy($id)
{
    $kategori = Kategori::findOrFail($id);
    $kategori->delete();

    return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
}



}
