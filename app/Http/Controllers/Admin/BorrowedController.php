<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailPeminjamanReq;
use App\Http\Resources\BarangRes;
use App\Http\Resources\DetailPeminjamanRes;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $borrowed = Peminjaman::with(['detailsBorrow', 'user'])->where('soft_delete', 0)->get();

        if ($borrowed->count() < 1) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found in collection!'
            ])->setStatusCode(404);
        }

        return response()->json([
            'status' => 200,
            'message' => '',
            'data' => BarangRes::collection($borrowed)
        ])->setStatusCode(200);
    }

    public function store(DetailPeminjamanReq $request): JsonResponse
    {
        $details = DetailPeminjaman::create($request->validated());

        $user = Auth::user();

        Peminjaman::create([
            'id_user' => $user->id_user,
            'id_details_borrow' => $details->id_details_borrow,
        ]);

        return response()->json([
            'status' => 201,
            'message' => 'Borrow success added!',
            'data' => new DetailPeminjamanRes($details)
        ])->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $borrowed = Peminjaman::with(['detailsBorrow', 'user'])->where('id_borrowed', $id)->first();

        if (!$borrowed) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found in collection!'
            ])->setStatusCode(404);
        }

        return response()->json([
            'status' => 200,
            'message' => '',
            'data' => new BarangRes($borrowed)
        ])->setStatusCode(200);
    }

    public function approve($id): JsonResponse
    {
        $borrowed = Peminjaman::find($id);

        if (!$borrowed) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found in collection!'
            ])->setStatusCode(404);
        }

        $borrowed->update(['status' => 'approved']);

        return response()->json([
            'status' => 200,
            'message' => 'Data approved by admin!',
        ])->setStatusCode(200);
    }

    public function reject($id): JsonResponse
    {
        $borrowed = Peminjaman::find($id);

        if (!$borrowed) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found in collection!'
            ])->setStatusCode(404);
        }

        $borrowed->update(['status' => 'not approved', 'soft_delete' => 1]);

        return response()->json([
            'status' => 200,
            'message' => 'Data rejected by admin!',
        ])->setStatusCode(200);
    }
}
