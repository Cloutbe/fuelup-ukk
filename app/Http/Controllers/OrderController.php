<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Kita butuh Transaction

class OrderController extends Controller
{
    // PROSES CHECKOUT DARI KERANJANG
    public function store(Request $request)
    {
        $request->validate([
            'table_number' => 'required|string|max:10',
        ]);

        // 1. Ambil semua item di keranjang user
        $carts = Cart::with('product')->where('user_id', Auth::id())->get();

        if($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjangmu kosong nih! Belanja dulu yuk. 🛍️');
        }

        // 2. Hitung Total Harga
        $totalPrice = 0;
        foreach($carts as $cart) {
            $totalPrice += $cart->product->price * $cart->quantity;
        }

        // KITA PAKAI DB TRANSACTION BIAR AMAN (Kalau error, semua batal)
        DB::transaction(function() use ($request, $carts, $totalPrice) {

            // 3. Buat Data Order Utama
            $order = Order::create([
                'user_id'      => Auth::id(),
                'total_price'  => $totalPrice,
                'table_number' => $request->table_number,
                'status'       => 'pending',
            ]);

            // 4. Pindahkan item Cart ke OrderItems
            foreach($carts as $cart) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $cart->product_id,
                    'quantity'   => $cart->quantity,
                    'price'      => $cart->product->price,
                ]);
            }

            // 5. Kosongkan Keranjang
            Cart::where('user_id', Auth::id())->delete();

            // Simpan ID Order buat redirect
            session()->put('last_order_id', $order->id);
        });

        $orderId = session()->get('last_order_id');
        return redirect()->route('orders.show', $orderId)->with('success', 'Pesanan berhasil dibuat! Silakan bayar ya. 💸');
    }

    // Detail Order & Upload Bukti (Sedikit penyesuaian untuk menampilkan banyak item)
    public function show($id)
    {
        $order = Order::with(['orderItems.product'])->where('user_id', Auth::id())->findOrFail($id);
        return view('client.orders.show', compact('order'));
    }

    // Upload bukti (Method ini sama, tidak perlu diubah)
    public function uploadProof(Request $request, $id)
    {
        $request->validate([ 'payment_proof' => 'required|image|max:2048' ]);
        $order = Order::where('user_id', Auth::id())->findOrFail($id);
        $image = $request->file('payment_proof');
        $image->storeAs('payment_proofs', $image->hashName(), 'public');
        $order->update([ 'payment_proof' => $image->hashName(), 'status' => 'awaiting_payment' ]);
        return redirect()->back()->with('success', 'Bukti terkirim!');
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        return view('client.orders.index', compact('orders'));
    }
}
