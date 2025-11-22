<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // TAMBAH KE KERANJANG
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Cek stok dulu
        if($product->stock < 1) {
            return redirect()->back()->with('error', 'Stok habis kak! 😢');
        }

        // Cek apakah barang ini sudah ada di keranjang user?
        $existingCart = Cart::where('user_id', Auth::id())
                            ->where('product_id', $id)
                            ->first();

        if($existingCart) {
            // Kalau sudah ada, tambah jumlahnya aja
            $existingCart->increment('quantity');
        } else {
            // Kalau belum, buat baru
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'quantity' => 1
            ]);
        }

        return redirect()->route('cart')->with('success', 'Berhasil masuk keranjang! 🛒');
    }

    // HAPUS DARI KERANJANG
    public function destroy($id)
    {
        $cart = Cart::where('user_id', Auth::id())->findOrFail($id);
        $cart->delete();
        return redirect()->back()->with('success', 'Item dihapus dari keranjang.');
    }
}
