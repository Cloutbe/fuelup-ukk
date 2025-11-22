<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // LIHAT DAFTAR USER
    public function index()
    {
        // Ambil user yang BUKAN admin (asumsi role admin punya id tertentu atau cek middleware)
        // Di sini kita ambil semua user biasa, urutkan dari yang terbaru
        $users = User::latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    // HAPUS USER (Jika ada user spam)
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        // Cegah admin menghapus dirinya sendiri
        if ($user->id == Auth::id()) {
            return redirect()->back()->with('error', 'Kamu tidak bisa menghapus akunmu sendiri!');
        }

        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus.');
    }
}

