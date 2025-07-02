<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UsersController extends Controller
{
    // 2. Buat metode index
    public function index()
    {
        // 3. Ambil semua data pengguna dari tabel 'users'
        $users = User::all();

        return response()->json([
            'success' => true,
            'message' => 'Data pengguna berhasil diambil',
            'data' => $users
        ]);
    }

    public function store(Request $request)
    {
        // 1. Validasi input dari request
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:50|unique:users',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:renter,assetOwner,admin',
            // Tambahkan validasi untuk field lain jika perlu
            'phoneNumber' => 'nullable|string|max:14',
            'birthDay' => 'nullable|date',
            'address' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422); // 422 Unprocessable Entity
        }

        // 2. Buat user baru (Password akan di-hash otomatis oleh Model)
        $user = User::create($validator->validated());

        // 3. Kembalikan response sukses dengan data user yang baru dibuat
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'data' => $user
        ], 201); // 201 Created
    }
}
