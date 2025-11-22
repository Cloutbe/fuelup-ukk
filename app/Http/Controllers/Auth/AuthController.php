<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // 1. TAMPILKAN FORM LOGIN
    public function showLogin()
    {
        return view('auth.login');
    }

    // 2. PROSES LOGIN (LOGIC REDIRECT ADA DI SINI)
    public function login(Request $request)
    {
        // Validasi Input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba Login
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // === LOGIC REDIRECT BERDASARKAN ROLE ===
            // Ambil user yang sedang login
            $user = Auth::user();

            if ($user->role === 'admin') {
                // Jika Admin, ke Dashboard Admin
                return redirect()->intended(route('admin.dashboard'));
            } else {
                // Jika User Biasa, ke Halaman Utama (Home)
                return redirect()->intended(route('home'));
            }
        }

        // Jika Gagal Login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // 3. TAMPILKAN FORM REGISTER
    public function showRegister()
    {
        return view('auth.register');
    }

    // 4. PROSES REGISTER
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Default role adalah User
        ]);

        // Langsung login setelah register
        Auth::login($user);

        // Redirect ke home
        return redirect()->route('home')->with('success', 'Selamat datang! Akun berhasil dibuat.');
    }

    // 5. PROSES LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
