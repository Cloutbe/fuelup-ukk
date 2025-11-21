<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *amfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // 1. Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // 2. Cek apakah role user sesuai dengan yang diminta
        if (Auth::user()->role !== $role) {
            // Jika User coba masuk halaman Admin -> Lempar ke Dashboard User
            // Jika Admin coba masuk halaman User -> Lempar ke Dashboard Admin (Opsional)
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}