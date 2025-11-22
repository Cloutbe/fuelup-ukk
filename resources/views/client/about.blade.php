@extends('layouts.user')

@section('title', 'Tentang Kami - Fuel Up')

@section('content')
<!-- Hero Section -->
<div class="bg-white">
    <div class="container mx-auto px-6 py-16 text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Cerita Kami</h1>
        <p class="text-gray-600 max-w-2xl mx-auto mb-8">
            Bermula dari kecintaan pada biji kopi lokal, Fuel Up Coffee hadir untuk menemani setiap langkah produktifmu.
        </p>
        <img src="https://images.unsplash.com/photo-1556740767-414a9c4860c1?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDF8MHxzZWFyY2h8MXx8Y29mZmVlfGVufDB8fDB8fHww" class="rounded-xl shadow-xl mx-auto w-full max-w-4xl h-96 object-cover">
    </div>
</div>

<!-- Values Section (Statis) -->
<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Kenapa Fuel Up?</h2>
            <p class="text-gray-500 mt-2">Komitmen kami untuk kualitas terbaik.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Item 1 -->
            <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition text-center">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                    <i class="fas fa-leaf"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">100% Kopi Lokal</h3>
                <p class="text-gray-500 text-sm">Kami bekerja sama langsung dengan petani kopi di Gayo dan Toraja.</p>
            </div>

            <!-- Item 2 -->
            <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition text-center">
                <div class="w-16 h-16 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                    <i class="fas fa-fire"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Fresh Roasted</h3>
                <p class="text-gray-500 text-sm">Biji kopi dipanggang setiap minggu untuk menjaga aroma terbaik.</p>
            </div>

            <!-- Item 3 -->
            <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition text-center">
                <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                    <i class="fas fa-mug-hot"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Barista Ahli</h3>
                <p class="text-gray-500 text-sm">Setiap cangkir diseduh dengan teknik presisi oleh tim profesional kami.</p>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="bg-blue-600 text-white py-16">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-4">Siap Mencoba Kopi Terbaik?</h2>
        <p class="mb-8 text-blue-100">Kunjungi outlet kami atau pesan sekarang juga!</p>
        <a href="{{ route('home') }}" class="bg-white text-blue-600 px-8 py-3 rounded-full font-bold hover:bg-gray-100 transition shadow-lg">
            Lihat Menu
        </a>
    </div>
</div>
@endsection
