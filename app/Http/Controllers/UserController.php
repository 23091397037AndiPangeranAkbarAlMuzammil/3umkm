<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Ambil semua user, bisa pakai paginate juga
        $users = User::all();
        return response()->json($users);
    }
}
