@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container mx-auto">

    <div class="mb-8 flex justify-between items-end">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">👋 Halo, Admin!</h2>
            <p class="text-gray-500">Selamat datang kembali di panel kontrol Fuel Up Coffee.</p>
        </div>
        <!-- TOMBOL DOWNLOAD LAPORAN -->
        <a href="{{ route('admin.reports.pdf') }}" target="_blank" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow-md transition flex items-center gap-2">
            <i class="fas fa-file-pdf"></i> Download Laporan Bulanan
        </a>
    </div>

    <!-- STATISTIC CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        <!-- Card 1: Pendapatan -->
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500 flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-500 font-bold uppercase tracking-wider">Total Pendapatan</p>
                <p class="text-2xl font-bold text-gray-800 mt-1">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
            </div>
            <div class="bg-green-100 text-green-600 p-3 rounded-full">
                <i class="fas fa-money-bill-wave text-xl"></i>
            </div>
        </div>

        <!-- Card 2: Total Pesanan -->
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500 flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-500 font-bold uppercase tracking-wider">Total Pesanan</p>
                <p class="text-2xl font-bold text-gray-800 mt-1">{{ $totalOrders }}</p>
            </div>
            <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
                <i class="fas fa-shopping-bag text-xl"></i>
            </div>
        </div>

        <!-- Card 3: Total Produk -->
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-purple-500 flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-500 font-bold uppercase tracking-wider">Total Menu</p>
                <p class="text-2xl font-bold text-gray-800 mt-1">{{ $totalProducts }}</p>
            </div>
            <div class="bg-purple-100 text-purple-600 p-3 rounded-full">
                <i class="fas fa-coffee text-xl"></i>
            </div>
        </div>

        <!-- Card 4: Perlu Diproses -->
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-500 flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-500 font-bold uppercase tracking-wider">Butuh Aksi</p>
                <p class="text-2xl font-bold text-gray-800 mt-1">{{ $pendingOrders }}</p>
            </div>
            <div class="bg-yellow-100 text-yellow-600 p-3 rounded-full">
                <i class="fas fa-bell text-xl"></i>
            </div>
        </div>
    </div>

    <!-- CHARTS SECTION (BARU) -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

        <!-- Chart 1: Penjualan Bulanan -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">📈 Grafik Penjualan Tahun Ini</h3>
            <canvas id="salesChart"></canvas>
        </div>

        <!-- Chart 2: Status Pesanan -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">🍩 Statistik Status Pesanan</h3>
            <div class="h-64 flex justify-center">
                <canvas id="statusChart"></canvas>
            </div>
        </div>

    </div>

    <!-- RECENT ORDERS TABLE -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <h3 class="text-lg font-bold text-gray-800">⏳ Pesanan Terbaru</h3>
            <a href="{{ route('admin.orders.index') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">Lihat Semua &rarr;</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="p-4 font-semibold">Order ID</th>
                        <th class="p-4 font-semibold">Pelanggan</th>
                        <th class="p-4 font-semibold">Total</th>
                        <th class="p-4 font-semibold">Status</th>
                        <th class="p-4 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($latestOrders as $order)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 font-bold text-gray-600">#{{ $order->id }}</td>
                        <td class="p-4">
                            <div class="font-medium text-gray-900">{{ $order->user->name }}</div>
                            <div class="text-xs text-gray-500">{{ $order->created_at->diffForHumans() }}</div>
                        </td>
                        <td class="p-4 font-bold text-blue-600">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td class="p-4">
                            @php
                                $colors = [
                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                    'awaiting_payment' => 'bg-orange-100 text-orange-800',
                                    'paid' => 'bg-green-100 text-green-800',
                                    'done' => 'bg-blue-100 text-blue-800',
                                    'cancelled' => 'bg-red-100 text-red-800',
                                ];
                            @endphp
                            <span class="px-2 py-1 rounded-full text-xs font-bold {{ $colors[$order->status] ?? 'bg-gray-100' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="p-4 text-right">
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="text-gray-400 hover:text-blue-600 transition">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-8 text-center text-gray-500 italic">Belum ada pesanan terbaru.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- SCRIPT CHART.JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // --- 1. CHART PENJUALAN BULANAN (LINE) ---
    const ctxSales = document.getElementById('salesChart').getContext('2d');
    new Chart(ctxSales, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Pendapatan (Rp)',
                data: @json($monthlySales), // Ambil data dari Controller
                borderColor: '#3B82F6', // Warna Garis (Blue-500)
                backgroundColor: 'rgba(59, 130, 246, 0.1)', // Warna Arsiran
                borderWidth: 2,
                tension: 0.4, // Biar garisnya melengkung halus
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID'); // Format Rupiah di sumbu Y
                        }
                    }
                }
            }
        }
    });

    // --- 2. CHART STATUS ORDER (DOUGHNUT) ---
    const ctxStatus = document.getElementById('statusChart').getContext('2d');
    new Chart(ctxStatus, {
        type: 'doughnut',
        data: {
            labels: ['Belum Bayar', 'Lunas/Selesai', 'Dibatalkan'],
            datasets: [{
                data: [
                    {{ $orderStats['pending'] }},
                    {{ $orderStats['paid'] }},
                    {{ $orderStats['cancelled'] }}
                ],
                backgroundColor: [
                    '#F59E0B', // Kuning (Pending)
                    '#10B981', // Hijau (Paid)
                    '#EF4444'  // Merah (Cancelled)
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endsection
