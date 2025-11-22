@extends('layouts.user')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-3xl mx-auto">

        <!-- Tombol Kembali -->
        <a href="{{ route('orders.index') }}" class="text-gray-500 hover:text-indigo-600 mb-4 inline-block transition">
            &larr; Kembali ke Riwayat Pesanan
        </a>

        <!-- Alert Sukses -->
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p class="font-bold">Berhasil!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="p-6 bg-gray-50 border-b border-gray-200 flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Order ID: #{{ $order->id }}</p>
                    <h2 class="text-xl font-bold text-gray-800">Detail Pesanan</h2>
                </div>

                <!-- Badge Status -->
                @php
                    $statusColor = [
                        'pending' => 'bg-yellow-100 text-yellow-800',
                        'awaiting_payment' => 'bg-blue-100 text-blue-800',
                        'paid' => 'bg-green-100 text-green-800',
                        'cancelled' => 'bg-red-100 text-red-800',
                    ];
                @endphp
                <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $statusColor[$order->status] ?? 'bg-gray-100' }}">
                    {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                </span>
            </div>

            <div class="p-6">
                <!-- Rincian Produk -->
                <div class="flex items-center mb-6">
                    <img src="{{ asset('storage/products/' . $order->product->image) }}" class="w-20 h-20 object-cover rounded-lg mr-4">
                    <div>
                        <h3 class="text-lg font-semibold">{{ $order->product->name }}</h3>
                        <p class="text-gray-600">{{ $order->quantity }} x Rp {{ number_format($order->product->price, 0, ',', '.') }}</p>
                    </div>
                    <div class="ml-auto text-xl font-bold text-indigo-600">
                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                    </div>
                </div>

                <hr class="my-4">

                <!-- Informasi Pembayaran (Hanya muncul kalau status masih pending) -->
                @if($order->status == 'pending')
                    <div class="bg-indigo-50 border border-indigo-200 rounded-lg p-4 mb-6">
                        <h3 class="text-indigo-800 font-bold mb-2">💳 Silakan Transfer ke:</h3>
                        <p class="text-gray-700">Bank BCA: <span class="font-mono font-bold text-lg">123-456-7890</span></p>
                        <p class="text-gray-700">Atas Nama: <span class="font-bold">Toko Kopi Keren</span></p>
                        <p class="text-sm text-gray-500 mt-2">*Silakan upload bukti transfer di bawah ini agar pesanan diproses.</p>
                    </div>

                    <!-- Form Upload Bukti -->
                    <form action="{{ route('orders.upload', $order->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Upload Bukti Transfer</label>
                            <input type="file" name="payment_proof" class="block w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-indigo-50 file:text-indigo-700
                                hover:file:bg-indigo-100
                                transition
                            " required>
                            @error('payment_proof')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition">
                            Kirim Bukti Transfer 📤
                        </button>
                    </form>

                @elseif($order->status == 'awaiting_payment')
                    <div class="text-center py-6">
                        <i class="fas fa-clock text-4xl text-blue-400 mb-3"></i>
                        <h3 class="text-lg font-bold text-gray-700">Menunggu Konfirmasi Admin</h3>
                        <p class="text-gray-500">Terima kasih! Bukti transfermu sedang kami cek ya. 🕵️‍♀️</p>
                    </div>
                    <!-- Tampilkan bukti yang sudah diupload -->
                    <div class="mt-4">
                        <p class="text-sm font-bold text-gray-600 mb-2">Bukti Transfer Anda:</p>
                        <img src="{{ asset('storage/payment_proofs/' . $order->payment_proof) }}" class="w-full max-w-sm rounded-lg border mx-auto">
                    </div>

                @elseif($order->status == 'paid')
                    <div class="text-center py-6">
                        <i class="fas fa-check-circle text-4xl text-green-500 mb-3"></i>
                        <h3 class="text-lg font-bold text-gray-700">Pembayaran Lunas!</h3>
                        <p class="text-gray-500">Pesananmu sedang disiapkan baristanya. Ditunggu ya! ☕</p>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
