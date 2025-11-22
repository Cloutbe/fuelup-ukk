@extends('layouts.admin')

@section('title', 'Detail Pesanan #' . $order->id)

@section('content')
<div class="container mx-auto max-w-4xl">

    <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center text-gray-600 hover:text-blue-600 mb-6 transition">
        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Pesanan
    </a>

    <!-- Alert Sukses -->
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
            <p class="font-bold">Berhasil!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="grid md:grid-cols-3 gap-6">

        <!-- KOLOM KIRI: INFO ORDER -->
        <div class="md:col-span-2 space-y-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-bold text-gray-800 border-b pb-2 mb-4">📦 Rincian Pesanan</h3>

                <div class="flex items-start gap-4 mb-6">
                    <img src="{{ asset('storage/products/' . $order->product->image) }}" class="w-24 h-24 object-cover rounded-lg border">
                    <div>
                        <h4 class="text-xl font-bold">{{ $order->product->name }}</h4>
                        <p class="text-gray-500">{{ $order->quantity }} pcs x Rp {{ number_format($order->product->price, 0, ',', '.') }}</p>
                        <p class="text-2xl font-bold text-blue-600 mt-2">Total: Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-gray-500">Pemesan:</p>
                        <p class="font-bold text-gray-800">{{ $order->user->name }}</p>
                        <p class="text-xs text-gray-400">{{ $order->user->email }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Lokasi Meja:</p>
                        <span class="bg-gray-800 text-white px-3 py-1 rounded text-lg font-bold">{{ $order->table_number }}</span>
                    </div>
                    <div>
                        <p class="text-gray-500">Tanggal Order:</p>
                        <p class="font-bold text-gray-800">{{ $order->created_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>
            </div>

            <!-- BUKTI TRANSFER -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-bold text-gray-800 border-b pb-2 mb-4">💳 Bukti Pembayaran</h3>

                @if($order->payment_proof)
                    <div class="text-center">
                        <img src="{{ asset('storage/payment_proofs/' . $order->payment_proof) }}" class="max-w-full rounded-lg border shadow-sm mx-auto mb-2" style="max-height: 400px;">
                        <a href="{{ asset('storage/payment_proofs/' . $order->payment_proof) }}" target="_blank" class="text-blue-500 hover:underline text-sm">Lihat Gambar Asli (Zoom)</a>
                    </div>
                @else
                    <div class="text-center py-8 bg-gray-50 rounded border border-dashed">
                        <i class="fas fa-image text-4xl text-gray-300 mb-2"></i>
                        <p class="text-gray-500">Pelanggan belum upload bukti transfer.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- KOLOM KANAN: AKSI -->
        <div class="md:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6 sticky top-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">⚙️ Aksi Admin</h3>

                <p class="text-sm text-gray-500 mb-1">Status Saat Ini:</p>
                <div class="mb-6">
                    <span class="px-3 py-1 rounded-full text-sm font-bold block text-center
                        {{ $order->status == 'paid' ? 'bg-green-100 text-green-800' :
                          ($order->status == 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                        {{ strtoupper($order->status) }}
                    </span>
                </div>

                    @if($order->status == 'paid' || $order->status == 'done')
                        <a href="{{ route('admin.orders.print', $order->id) }}" target="_blank" class="w-full bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded transition flex items-center justify-center gap-2 mb-3">
                            <i class="fas fa-print"></i> Cetak Struk
                        </a>
                    @endif

                <hr class="mb-6">

                <!-- Tombol Update Status -->
                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="space-y-3">
                    @csrf
                    @method('PUT')

                    @if($order->status == 'awaiting_payment' || $order->status == 'pending')
                        <button name="status" value="paid" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition flex items-center justify-center gap-2">
                            <i class="fas fa-check"></i> Terima Pembayaran
                        </button>
                    @endif

                    @if($order->status == 'paid')
                        <button name="status" value="done" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition flex items-center justify-center gap-2">
                            <i class="fas fa-check-double"></i> Pesanan Selesai
                        </button>
                    @endif

                    @if($order->status != 'cancelled' && $order->status != 'done')
                        <button name="status" value="cancelled" onclick="return confirm('Yakin ingin menolak pesanan ini?')" class="w-full bg-gray-200 hover:bg-red-100 text-gray-700 hover:text-red-600 font-bold py-2 px-4 rounded transition border border-gray-300">
                            <i class="fas fa-times"></i> Tolak / Batalkan
                        </button>
                    @endif

                </form>
            </div>
        </div>

    </div>
</div>
@endsection
