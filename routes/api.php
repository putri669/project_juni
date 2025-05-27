<?php

use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\BorrowedController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PengembalianController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [AuthController::class, 'Login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::delete('/logout/{id}', [AuthController::class, 'Logout'])->where('id', '[0-9]+');

    Route::middleware('role:user|admin')->group(function () {
        //profile
        Route::get('/me', [AuthController::class, 'Me']);

        // category users endpoint
        Route::get('/category-items', [KategoriController::class, 'index']);
        Route::get('/category-items/{id}', [KategoriController::class, 'show']);

        //item users endpoint
        Route::get('/items', [BarangController::class, 'index']);
        Route::get('/items/{id}', [BarangController::class, 'show']);

        //borrowed users endpoint
        Route::get('/borrowed', [BorrowedController::class, 'index']);
        Route::get('/borrowed/{id}', [BorrowedController::class, 'show']);

        //users endpoint
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/users/{id}', [UserController::class, 'show']);

        //return user endpoint
        Route::get('/return', [PengembalianController::class, 'index']);
        Route::get('/return/{id}', [PengembalianController::class, 'show']);
    });

    Route::middleware('role:admin')->group(function () {
        //for dashboard
        Route::get('/dashboard-admin', [DashboardController::class, 'Dashboard']);

        //for admin manage users
        Route::post('/users', [UserController::class, 'store']);
        Route::put('/users/{id}', [UserController::class, 'update'])->where('id', '[0-9]+');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->where('id', '[0-9]+');

        //for admin manage item
        Route::post('/items', [BarangController::class, 'store']);
        Route::put('/items/{id}', [BarangController::class, 'update']);
        Route::delete('/items/{id}', [BarangController::class, 'destroy']);

        //for admin manage categories
        Route::post('/category-items', [KategoriController::class, 'store']);
        Route::put('/category-items/{id}', [KategoriController::class, 'update'])->where('id', '[0-9]+');
        Route::delete('/category-items/{id}', [KategoriController::class, 'destroy'])->where('id', '[0-9]+');

        //for admin manage borrowed
        Route::put('/borrowed/{id}/approved', [BorrowedController::class, 'approve'])->where('id', '[0-9]+');
        Route::put('/borrowed/{id}/reject', [BorrowedController::class, 'reject'])->where('id', '[0-9]+');

        //for admin manage return
        Route::put('/return/{id}/approved', [PengembalianController::class, 'approve']);
        Route::put('/return/{id}/reject', [PengembalianController::class, 'reject']);
    });
});
