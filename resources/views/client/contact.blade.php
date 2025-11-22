@extends('layouts.user')

@section('title', 'Hubungi Kami - Fuel Up')

@section('content')
<!-- Header Section -->
<div class="bg-white shadow-sm py-12">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Hubungi Kami</h1>
        <p class="text-gray-500">Kami siap mendengar masukan dan pertanyaanmu.</p>
    </div>
</div>

<div class="container mx-auto px-6 py-12">
    <div class="grid md:grid-cols-2 gap-12 max-w-5xl mx-auto">

        <!-- Informasi Kontak -->
        <div class="space-y-8">
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition">
                <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <span class="bg-blue-100 text-blue-600 p-2 rounded-lg"><i class="fas fa-map-marked-alt"></i></span>
                    Lokasi Outlet
                </h3>
                <p class="text-gray-600 leading-relaxed">
                    <strong>Fuel Up Coffee HQ</strong><br>
                    Jl. Kopi Nikmat No. 1, Jakarta Selatan<br>
                    DKI Jakarta, Indonesia 12345
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition text-center">
                    <div class="text-blue-600 text-3xl mb-3"><i class="fab fa-whatsapp"></i></div>
                    <h4 class="font-bold text-gray-700">WhatsApp</h4>
                    <p class="text-gray-500 text-sm mt-1">+62 812-3456-7890</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition text-center">
                    <div class="text-blue-600 text-3xl mb-3"><i class="fas fa-envelope-open-text"></i></div>
                    <h4 class="font-bold text-gray-700">Email</h4>
                    <p class="text-gray-500 text-sm mt-1">hello@fuelup.com</p>
                </div>
            </div>
        </div>

        <!-- Form Kontak (Dummy) -->
        <div class="bg-white p-8 rounded-xl shadow-lg">
            <h3 class="text-xl font-bold text-gray-800 mb-6">Kirim Pesan</h3>

            <form onsubmit="event.preventDefault(); alert('Terima kasih! Pesan Anda telah kami terima (Simulasi).');">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                    <input type="text" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" placeholder="Nama Anda">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" placeholder="email@anda.com">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Pesan</label>
                    <textarea class="w-full border border-gray-300 rounded-lg px-4 py-2 h-32 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" placeholder="Tulis pesanmu di sini..."></textarea>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition shadow-lg shadow-blue-500/30">
                    Kirim Pesan
                </button>
            </form>
        </div>

    </div>
</div>
@endsection
