<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Jangan lupa import Model Product
use App\Models\Category; // Import Model Category

class HomeController extends Controller
{
    // HALAMAN DEPAN (LANDING PAGE)
    public function index()
    {
        // Ambil 3 produk terbaru untuk ditampilkan di bagian "Trending"
        $products = Product::latest()->filter(request(['search', 'category']))->get();

        $categories = Category::all();

        // Arahkan ke view client/landing dan kirim datanya
        return view('client.landing', compact('products', 'categories'));
    }

    // DASHBOARD USER (Setelah Login)
    public function dashboard()
    {
        // Bisa diarahkan ke landing page juga, atau dashboard khusus
        $products = Product::latest()->take(3)->get();
        return view('client.landing', compact('products'));
    }

    // MENU PAGE (Opsional, jika kamu mau buat halaman menu terpisah)
    public function menu()
    {
        $products = Product::all(); // Ambil semua produk
        // Kamu bisa buat view client.menu nanti
        return view('client.landing', compact('products')); // Sementara arahkan ke landing dulu
    }

    public function about()
    {
        return view('client.about'); // Pastikan file view-nya ada
    }

    public function contact()
    {
        return view('client.contact'); // Pastikan file view-nya ada
    }

    public function cart()
    {
        // Ambil data keranjang user yang sedang login
        $carts = \App\Models\Cart::with('product')->where('user_id', \Illuminate\Support\Facades\Auth::id())->get();
        return view('client.cart', compact('carts'));
    }

}
