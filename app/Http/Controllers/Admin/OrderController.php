<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // 1. LIHAT DAFTAR SEMUA PESANAN
    public function index()
    {
        // Ambil data order beserta relasi user & product, urutkan dari yang terbaru
        $orders = Order::with(['user', 'product'])->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    // 2. LIHAT DETAIL PESANAN & BUKTI TRANSFER
    public function show($id)
    {
        $order = Order::with(['user', 'product'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // 3. UPDATE STATUS PESANAN (Konfirmasi/Tolak/Selesai)
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,awaiting_payment,paid,done,cancelled'
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'status' => $request->status
        ]);

        // Kalau status diubah jadi 'paid', kurangi stok produk (Opsional, fitur cerdas!)
        if ($request->status == 'paid') {
            $product = $order->product;
            $product->stock = $product->stock - $order->quantity;
            $product->save();
        }

        return redirect()->route('admin.orders.show', $id)->with('success', 'Status pesanan berhasil diperbarui! 🚀');
    }
}
