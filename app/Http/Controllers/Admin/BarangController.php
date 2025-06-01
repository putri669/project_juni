<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BarangReq;
use App\Http\Resources\BarangRes;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::with('category')->get();
        return view('admin.barang.index', compact('barang'));
    }

    public function store(BarangReq $request): JsonResponse
    {
        $data = $request->validated();

        if ($request->hasFile('item_image')) {
            $data['item_image'] = $request->file('item_image')->store('images', 'public');
        }

        $item = Barang::create($data);

        return response()->json([
            'status' => 201,
            'message' => 'Barang berhasil di tambahkan!',
            'data' => new BarangRes($item)
        ], 201);
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.barang.create', compact('kategori'));
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.barang.edit', compact('barang', 'kategori'));
    }

    public function update(BarangReq $request, $id): JsonResponse
    {
        $req = $request->validated();

        $item = Barang::find($id);

        if (!$item) {
            return response()->json([
                'status' => 404,
                'message' => 'Data tidak ada di koleksi!'
            ], 404);
        }

        if ($request->hasFile('item_image')) {
            $req['item_image'] = $request->file('item_image')->store('images', 'public');
        }

        $item->update($req);

        return response()->json([
            'status' => 200,
            'message' => 'Barang berhasil di perbarui!',
            'data' => new BarangRes($item)
        ], 200);
    }

    public function destroy($id): JsonResponse
    {
        $item = Barang::find($id);

        if (!$item) {
            return response()->json([
                'status' => 404,
                'message' => 'Data tidak ada di koleksi!'
            ], 404);
        }

        $item->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Barang berhasil di hapus!'
        ], 200);
    }
}
