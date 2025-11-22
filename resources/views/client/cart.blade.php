@extends('layouts.user')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
        <i class="fas fa-shopping-cart text-blue-600"></i> Keranjang Belanja
    </h2>

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="flex flex-col md:flex-row gap-8">

        <!-- LIST ITEM KERANJANG -->
        <div class="md:w-2/3">
            @if($carts->count() > 0)
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    @php $grandTotal = 0; @endphp
                    @foreach($carts as $cart)
                    @php $subtotal = $cart->product->price * $cart->quantity; $grandTotal += $subtotal; @endphp
                    <div class="p-6 border-b border-gray-100 flex items-center gap-4">
                        <img src="{{ asset('storage/products/' . $cart->product->image) }}" class="w-20 h-20 object-cover rounded-lg">
                        <div class="flex-grow">
                            <h3 class="font-bold text-gray-800">{{ $cart->product->name }}</h3>
                            <p class="text-sm text-gray-500">Rp {{ number_format($cart->product->price, 0, ',', '.') }} / pcs</p>
                            <div class="mt-2 flex items-center gap-3">
                                <span class="bg-gray-100 px-3 py-1 rounded text-sm font-bold">Qty: {{ $cart->quantity }}</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-blue-600">Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
                            <form action="{{ route('cart.delete', $cart->id) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 text-xs hover:underline"><i class="fas fa-trash"></i> Hapus</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-white rounded-xl shadow-md">
                    <i class="fas fa-shopping-basket text-6xl text-gray-200 mb-4"></i>
                    <p class="text-gray-500">Keranjangmu masih kosong nih.</p>
                    <a href="{{ url('/') }}" class="mt-4 inline-block bg-blue-600 text-white px-6 py-2 rounded-full font-bold hover:bg-blue-700">Belanja Sekarang</a>
                </div>
            @endif
        </div>

        <!-- FORM CHECKOUT (TOTAL & NO MEJA) -->
        @if($carts->count() > 0)
        <div class="md:w-1/3">
            <div class="bg-white rounded-xl shadow-md p-6 sticky top-24">
                <h3 class="font-bold text-lg mb-4 text-gray-800">Ringkasan Pesanan</h3>

                <div class="flex justify-between mb-2 text-gray-600">
                    <span>Total Item</span>
                    <span>{{ $carts->sum('quantity') }} pcs</span>
                </div>
                <div class="flex justify-between mb-6 text-xl font-bold text-gray-900 border-t pt-4">
                    <span>Total Bayar</span>
                    <span>Rp {{ number_format($grandTotal, 0, ',', '.') }}</span>
                </div>

                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nomor Meja</label>
                        <input type="text" name="table_number" class="w-full border rounded p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 font-bold text-lg text-center" placeholder="Contoh: 05" required>
                        @error('table_number') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-500/30">
                        Checkout Sekarang 🚀
                    </button>
                </form>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection
