<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    // TAMPILKAN HALAMAN PROFIL
    public function edit()
    {
        $user = Auth::user();
        return view('client.profile', compact('user'));
    }

    // UPDATE PROFIL (NAMA, EMAIL, PASSWORD)
    public function update(Request $request)
    {
        $user = Auth::user(); // Ambil user yang sedang login

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id, // Cek unik kecuali punya sendiri
            'password' => 'nullable|min:8|confirmed', // Password opsional, kalau diisi harus 8 karakter & ada konfirmasi
        ]);

        // Update Data Dasar
        $user->name = $request->name;
        $user->email = $request->email;

        // Cek apakah user mengisi password baru?
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Simpan perubahan (karena kita pakai instance $user langsung, bisa pakai save)
        /** @var \App\Models\User $user */
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui! ✨');
    }
}
