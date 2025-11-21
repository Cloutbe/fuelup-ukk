@extends('layouts.admin') {{-- Memanggil Master Layout Admin --}}

@section('title', 'Dashboard - Fuel Up Admin')

@section('content')
    {{-- JUDUL HALAMAN --}}
    <div class="mb-6 flex justify-between items-end">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Overview</h1>
            <p class="text-gray-500 text-sm">Welcome back, here is what's happening today.</p>
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-500/30">
            <i class="fas fa-plus mr-2"></i> Add New Product
        </button>
    </div>

    {{-- KARTU STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Total Pendapatan -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition">
            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-xl">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div>
                <p class="text-gray-500 text-xs font-bold uppercase">Total Revenue</p>
                <h3 class="text-2xl font-bold text-gray-800">$12,450</h3>
            </div>
        </div>

        <!-- Total Pesanan -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition">
            <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center text-xl">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div>
                <p class="text-gray-500 text-xs font-bold uppercase">Total Orders</p>
                <h3 class="text-2xl font-bold text-gray-800">1,240</h3>
            </div>
        </div>

        <!-- Total Produk -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition">
            <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center text-xl">
                <i class="fas fa-coffee"></i>
            </div>
            <div>
                <p class="text-gray-500 text-xs font-bold uppercase">Total Products</p>
                <h3 class="text-2xl font-bold text-gray-800">45</h3>
            </div>
        </div>

        <!-- Pelanggan -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition">
            <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-xl">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <p class="text-gray-500 text-xs font-bold uppercase">Customers</p>
                <h3 class="text-2xl font-bold text-gray-800">890</h3>
            </div>
        </div>
    </div>

    {{-- TABEL PESANAN TERBARU (CONTOH) --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50">
            <h3 class="font-bold text-gray-800">Recent Orders</h3>
            <a href="#" class="text-blue-600 text-sm font-bold hover:underline">View All</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th class="px-6 py-3">Order ID</th>
                        <th class="px-6 py-3">Customer</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Date</th>
                        <th class="px-6 py-3 text-right">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b hover:bg-blue-50 transition">
                        <td class="px-6 py-4 font-medium text-blue-600">#ORD-001</td>
                        <td class="px-6 py-4 font-medium text-gray-900">Budi Santoso</td>
                        <td class="px-6 py-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-bold">Completed</span></td>
                        <td class="px-6 py-4">20 Nov 2023</td>
                        <td class="px-6 py-4 text-right font-bold text-gray-800">$12.50</td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-blue-50 transition">
                        <td class="px-6 py-4 font-medium text-blue-600">#ORD-002</td>
                        <td class="px-6 py-4 font-medium text-gray-900">Siti Aminah</td>
                        <td class="px-6 py-4"><span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-bold">Pending</span></td>
                        <td class="px-6 py-4">20 Nov 2023</td>
                        <td class="px-6 py-4 text-right font-bold text-gray-800">$8.00</td>
                    </tr>
                    <tr class="bg-white border-b hover:bg-blue-50 transition">
                        <td class="px-6 py-4 font-medium text-blue-600">#ORD-003</td>
                        <td class="px-6 py-4 font-medium text-gray-900">John Doe</td>
                        <td class="px-6 py-4"><span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-bold">Cancelled</span></td>
                        <td class="px-6 py-4">19 Nov 2023</td>
                        <td class="px-6 py-4 text-right font-bold text-gray-800">$15.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection