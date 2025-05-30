<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserReq;
use App\Http\Resources\UserRes;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
       $users = User::all();
    return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function edit($id_user){
        $user = User::findOrFail($id_user);
        return view('admin.user.edit', compact('user'));
    }

    public function show(int $id_user): JsonResponse
    {
        $user = User::where('id_user', $id_user)->first();

        if (!$user) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found!'
            ])->setStatusCode(404);
        }

        return response()->json([
            'status' => 200,
            'message' => '',
            'data' => new UserRes($user)
        ])->setStatusCode(200);
    }

    public function store(UserReq $request): JsonResponse
    {
        $data = $request->validated();

        if (User::where('email', $data['email'])->count() > 0) {
            return response()->json([
                'status' => 422,
                'message' => 'Email sudah ada yang pakai!'
            ])->setStatusCode(422);
        }

        $user = new User($data);
        $user->password = Hash::make($data['password']);
        $user->save();

        return response()->json([
            'status' => 201,
            'message' => 'User berhasil di tambahkan!',
            'data' => new UserRes($user)
        ], 201);
    }

    public function update(UserReq $request, $id_user): JsonResponse
    {
        $data = $request->validated();
        $user = User::where('id_user', $id_user)->first();

        if (!$user) {
            return response()->json([
                'status' => 404,
                'message' => "User dengan id {$id_user} tidak di temukan!"
            ],404);
        }

        $user->password = Hash::make($data['password']);
        $user->fill($data);
        $user->save();

        return response()->json([
            'status' => 200,
            'message' => 'User sudah di update!',
            'data' => new UserRes($user)
        ], 200);
    }

    public function destroy($id_user) {
        $user = User::where('id_user', $id_user)->first();

        if (!$user) {
            return response()->json([
                'status' => 404,
                'message' => "User dengan id {$id_user} tidak di temukan!"
            ], 404);
        }

        $user->delete();

        return response()->json([
            'status' => 200,
            'message' => 'User berhasil di hapus!'
        ], 200);
    }
}
