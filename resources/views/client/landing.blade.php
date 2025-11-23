@extends('layouts.user')

@section('title', 'Home - Fuel Up')

@section('content')
    <!-- HERO SECTION -->
    <header class="hero-gradient text-white relative overflow-hidden">
        <div class="container mx-auto px-6 py-16 md:py-24 grid md:grid-cols-2 gap-12 items-center">
            <div class="z-10">
                <span class="bg-white/20 px-3 py-1 rounded-full text-sm font-semibold mb-4 inline-block backdrop-blur-sm border border-white/30">
                    ✨ Premium Coffee Experience
                </span>
                <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6 drop-shadow-md">
                    Awali Harimu dengan <br> Kopi Terbaik
                </h1>
                <p class="text-lg text-blue-50 mb-8 max-w-md leading-relaxed">
                    Rasakan kenikmatan biji kopi pilihan yang diseduh dengan hati. Pesan dari meja, kami antar dengan senyum.
                </p>

                <!-- SEARCH BAR (Action ke Menu) -->
                <form action="{{ route('menu') }}" method="GET" class="bg-white p-2 rounded-full shadow-xl max-w-md flex">
                    <input type="text" name="search" placeholder="Mau pesan apa hari ini?" class="flex-grow px-6 py-3 rounded-l-full text-gray-700 focus:outline-none">
                    <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-full font-bold hover:bg-blue-700 transition flex items-center gap-2">
                        Cari <i class="fas fa-arrow-right"></i>
                    </button>
                </form>
            </div>

            <div class="relative z-10 hidden md:block">
                <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=800" class="rounded-3xl shadow-2xl border-8 border-white/10 w-full object-cover h-[450px] rotate-2 hover:rotate-0 transition duration-500">

                <!-- Floating Badge -->
                <div class="absolute -bottom-6 -left-6 bg-white text-gray-800 p-4 rounded-2xl shadow-xl flex items-center gap-4 animate-bounce">
                    <div class="bg-green-100 text-green-600 p-3 rounded-full text-xl">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-bold uppercase">Status Toko</p>
                        <p class="text-sm font-bold">Buka Sekarang!</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- KATEGORI CEPAT -->
    <section class="py-12 container mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach(['Coffee', 'Non-Coffee', 'Snack', 'Pastry'] as $cat)
            <a href="{{ route('menu', ['category' => $cat]) }}" class="group bg-white border border-gray-100 p-6 rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition duration-300 flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-gray-800 group-hover:text-blue-600 transition">{{ $cat }}</h3>
                    <p class="text-xs text-gray-400">Lihat Menu &rarr;</p>
                </div>
                <div class="w-10 h-10 bg-gray-50 rounded-full flex items-center justify-center text-gray-400 group-hover:bg-blue-600 group-hover:text-white transition">
                    <i class="fas fa-mug-hot"></i>
                </div>
            </a>
            @endforeach
        </div>
    </section>

    <!-- TRENDING SECTION (HANYA 6 PRODUK) -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">🔥 Paling Laris</h2>
                    <p class="text-gray-500 mt-2">Menu favorit pelanggan minggu ini.</p>
                </div>
                <a href="{{ route('menu') }}" class="hidden md:inline-block text-blue-600 font-bold hover:underline">Lihat Semua Menu &rarr;</a>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach($trendingProducts as $product)
                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 group">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('storage/products/' . $product->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur p-2 rounded-lg shadow-sm">
                            <span class="block text-xs font-bold text-center text-gray-800">IDR</span>
                            <span class="block font-bold text-blue-600">{{ number_format($product->price / 1000, 0) }}k</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $product->name }}</h3>
                        <p class="text-gray-500 text-sm line-clamp-2 mb-4">{{ $product->description }}</p>

                        @auth
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button class="w-full bg-gray-900 text-white py-3 rounded-xl font-bold hover:bg-blue-600 transition flex items-center justify-center gap-2">
                                    <i class="fas fa-shopping-cart"></i> Pesan Sekarang
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="block w-full bg-gray-100 text-gray-600 text-center py-3 rounded-xl font-bold hover:bg-gray-200 transition">
                                Login untuk Pesan
                            </a>
                        @endauth
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-12 text-center md:hidden">
                 <a href="{{ route('menu') }}" class="inline-block border border-gray-300 text-gray-600 px-8 py-3 rounded-full font-bold hover:bg-gray-100 transition">
                    Jelajahi Menu Lengkap
                 </a>
            </div>
        </div>
    </section>
@endsection
