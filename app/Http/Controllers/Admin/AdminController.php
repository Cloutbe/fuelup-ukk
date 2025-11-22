<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Tambahkan ini buat query chart

class AdminController extends Controller
{
    public function index()
    {
        // === EXISTING DATA (KARTU STATISTIK) ===
        $totalRevenue = Order::whereIn('status', ['paid', 'done'])->sum('total_price');
        $totalOrders = Order::where('status', '!=', 'cancelled')->count();
        $totalProducts = Product::count();
        $pendingOrders = Order::whereIn('status', ['pending', 'awaiting_payment'])->count();
        $latestOrders = Order::with('user')->latest()->take(5)->get();

        // === DATA UNTUK CHART 1: PENDAPATAN BULANAN (TAHUN INI) ===
        $monthlySales = [];
        // Loop dari bulan 1 (Januari) sampai 12 (Desember)
        for ($i = 1; $i <= 12; $i++) {
            $monthlySales[] = Order::whereMonth('created_at', $i)
                ->whereYear('created_at', date('Y'))
                ->whereIn('status', ['paid', 'done']) // Hanya hitung yang sudah bayar
                ->sum('total_price');
        }

        // === DATA UNTUK CHART 2: KOMPOSISI STATUS PESANAN ===
        // Kita hitung jumlah order berdasarkan statusnya masing-masing
        $orderStats = [
            'pending'   => Order::where('status', 'pending')->count(),
            'paid'      => Order::whereIn('status', ['paid', 'done'])->count(),
            'cancelled' => Order::where('status', 'cancelled')->count(),
        ];

        return view('admin.dashboard', compact(
            'totalRevenue',
            'totalOrders',
            'totalProducts',
            'pendingOrders',
            'latestOrders',
            'monthlySales', // Kirim data penjualan bulanan
            'orderStats'    // Kirim data status order
        ));
    }
}
