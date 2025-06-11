<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UMKMController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::middleware('auth:sanctum')->get('/users', [UserController::class, 'index']);

Route::get('/umkm', [UMKMController::class, 'index']);  // Menampilkan semua UMKM
Route::post('/umkm', [UMKMController::class, 'store']); // Menyimpan UMKM baru
Route::put('/umkm/{id}', [UMKMController::class, 'update']); // Mengupdate UMKM berdasarkan ID
Route::delete('/umkm/{id}', [UMKMController::class, 'destroy']); // Menghapus UMKM berdasarkan ID

Route::post('/login', function(Request $request){
    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    // Hapus token lama kalau ada
    $user->tokens()->delete();

    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json(['token' => $token]);
});