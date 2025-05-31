<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailPengembalianReq;
use App\Http\Resources\DetailPeminjamanRes;
use App\Http\Resources\DetailPengembalianRes;
use App\Models\DetailPeminjaman;
use App\Models\DetailPengembalian;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $returns = DetailPengembalian::with('borrowed')->where('soft_delete', 0)->get();

        return view('admin.pengembalian.index' , compact('returns'));
    }

    public function store(DetailPengembalianReq $request): JsonResponse
    {
        $data = $request->validated();

        if ($request->hasFile('return_image')) {
            $data['return_image'] = $request->file('return_image')->store('images', 'public');
        }

        $return = DB::table('detail_returns')->insert([
            'id_borrowed' => $data['id_borrowed'],
            'return_image' => $data['return_image'],
            'description' => $data['description'],
            'date_return' => $data['']
        ]);

        return response()->json([
            'status' => 200,
            'message' => '',
            'data' => new DetailPengembalianRes($return)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id) : JsonResponse
    {
        $return = DetailPengembalian::where('id_detail_return', $id)->first();

        if (!$return) {
            return response()->json([
                'status' => 404,
                'message' => `Data with id $id not found in collection!`,
            ])->setStatusCode(404);
        }

        return response()->json([
            'status' => 200,
            'message' => '',
            'data' => new DetailPengembalianRes($return)
        ]);
    }

    public function approve($id): JsonResponse
    {
        $return = DetailPengembalian::find($id);

        if (!$return) {
            return response()->json([
                'status' => 404,
                'message' => `Data with id $id not found in collection!`
            ])->setStatusCode(404);
        }

        $return->update(['status' => 'approve']);

        return response()->json([
            'status' => 200,
            'message' => 'Data approved by admin!'
        ])->setStatusCode(200);
    }

    public function reject($id): JsonResponse
    {
        $return = DetailPengembalian::find($id);

        if (!$return) {
            return response()->json([
                'status' => 404,
                'message' => `Data with id $id not found in collection!`
            ])->setStatusCode(404);
        }

        $return->udpate([
            'status' => 'not approve',
            'soft_delete' => 1
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Data rejected by admin!'
        ])->setStatusCode(200);
    }
}
