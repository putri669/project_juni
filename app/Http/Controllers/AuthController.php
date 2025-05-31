<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginReq;
use App\Http\Resources\UserRes;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Tampilan Form Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses Login
    public function login(LoginReq $request): JsonResponse
    {
        $data = $request->validated();

        if(!Auth::attempt($data)){
            return response()->json([
                'status' => 404,
                'message' => 'Name atau passwrod anda salah!'
            ], 404);
        }

        $user = Auth::user();

        $token = $user->createToken("API_TOKEN")->plainTextToken;

        return response()->json([
            'status' => 200,
            'message' => "Anda berhasil login!",
            'token' => $token,
            'token_type' => 'Bearer'
        ], 200);
    }

    public function loginWeb(Request $request)
{
    $credentials = $request->validate([
        'name' => ['required'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended(route('admin.dashboard'));
    }

    return back()->withErrors([
        'name' => 'Name atau password salah',
    ])->onlyInput('name');
}

    public function me(Request $request) {
        $user = $request->user();
        return response()->json([
            'status' => 200,
            'message' => 'Data berhasil di ambil!',
            'data' => new UserRes($user)
        ], 200);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');
    }
}
