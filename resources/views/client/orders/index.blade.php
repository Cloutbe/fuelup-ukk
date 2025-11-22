@extends('layouts.user')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">📦 Riwayat Pesanan Saya</h2>

    @if($orders->count() > 0)
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Produk
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Total Harga
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Tanggal
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">
                                        <img class="w-full h-full rounded-full object-cover" src="{{ asset('storage/products/' . $order->product->image) }}" alt="" />
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap font-bold">
                                            {{ $order->product->name }}
                                        </p>
                                        <p class="text-gray-500 text-xs">Qty: {{ $order->quantity }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $order->created_at->format('d M Y') }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                @php
                                    $statusClasses = [
                                        'pending' => 'bg-yellow-200 text-yellow-900',
                                        'awaiting_payment' => 'bg-blue-200 text-blue-900',
                                        'paid' => 'bg-green-200 text-green-900',
                                        'cancelled' => 'bg-red-200 text-red-900',
                                    ];
                                    $class = $statusClasses[$order->status] ?? 'bg-gray-200 text-gray-900';
                                @endphp
                                <span class="relative inline-block px-3 py-1 font-semibold leading-tight rounded-full {{ $class }}">
                                    <span class="relative">{{ ucfirst(str_replace('_', ' ', $order->status)) }}</span>
                                </span>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="{{ route('orders.show', $order->id) }}" class="text-indigo-600 hover:text-indigo-900 font-bold">
                                    Detail / Bayar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center py-10 bg-gray-50 rounded-lg">
            <p class="text-gray-500 text-lg">Kamu belum pernah pesan kopi nih. Yuk pesan sekarang! ☕</p>
            <a href="{{ route('home') }}" class="mt-4 inline-block bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 transition">Lihat Menu</a>
        </div>
    @endif
</div>
@endsection
