<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriReq;
use App\Http\Resources\KategoriRes;
use App\Models\Kategori;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(): JsonResponse {
        $kategori = Kategori::all();

        if($kategori->count() < 1){
            return response()->json([
                'status' => 404,
                'message' => 'Data tidak ada di koleksi!'
            ]);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Data berhasil di ambil!',
            'data' => KategoriRes::collection($kategori)
        ], 200);
    }

    public function store(KategoriReq $request): JsonResponse {
        $category = Kategori::create($request->validated());

        return response()->json([
            'status' => 201,
            'message' => 'Category created successfully!',
            'data' => new KategoriRes($category)
        ], 201);
    }

    public function update(KategoriReq $request, $id): JsonResponse {
        $req = $request->validated();

        $category = Kategori::find($id);

        if (!$category) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found in collection!'
            ])->setStatusCode(404);
        }

        $category->update($req);

        return response()->json([
            'status' => 200,
            'message' => 'Category updated successfully!',
            'data' => new KategoriRes($category)
        ])->setStatusCode(200);
    }

    public function destroy($id): JsonResponse {
        $category = Kategori::find($id);

        if (!$category) {
            return response()->json([
                'status' => 404,
                'message' => "Data with id {$id} not found in collection!"
            ])->setStatusCode(404);
        }

        $category->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Category deleted successfully!'
        ])->setStatusCode(200);
    }
}
