<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth; // <--- WAJIB IMPORT INI

class HomeController extends Controller
{
    // HALAMAN UTAMA (LANDING PAGE)
    public function index()
    {
        $trendingProducts = Product::latest()->take(6)->get();
        $categories = Category::all();

        return view('client.landing', compact('trendingProducts', 'categories'));
    }

    // HALAMAN MENU (KATALOG LENGKAP)
    public function menu()
    {
        $products = Product::latest()
                    ->filter(request(['search', 'category']))
                    ->paginate(9);

        $categories = Category::all();

        return view('client.menu', compact('products', 'categories'));
    }

    public function dashboard() { return $this->index(); }

    // === PERBAIKAN DI SINI ===
    public function cart()
    {
        // Kita gunakan Auth::id() yang lebih stabil daripada auth()->id()
        $userId = Auth::id();

        // Jika ada userId (Login), ambil datanya. Jika tidak, buat koleksi kosong.
        $carts = $userId
            ? Cart::with('product')->where('user_id', $userId)->get()
            : collect();

        return view('client.cart', compact('carts'));
    }
    // ==========================

    public function about() { return view('client.about'); }
    public function contact() { return view('client.contact'); }
}
