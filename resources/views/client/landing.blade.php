@extends('layouts.user')

@section('title', 'Home - Fuel Up')

@section('content')
    <!-- HERO SECTION -->
    <header class="hero-gradient text-white relative overflow-hidden">
        <div class="container mx-auto px-6 py-12 md:py-20 grid md:grid-cols-2 gap-12 items-center">
            <div class="z-10">
                <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">
                    FUEL UP Your Day <br> with Perfect Coffee
                </h1>

                <!-- SEARCH BAR -->
                <form action="{{ url('/') }}" method="GET" class="bg-white p-2 rounded-full shadow-lg max-w-md flex">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kopi kesukaanmu..." class="flex-grow px-4 py-2 rounded-l-full text-gray-700 focus:outline-none">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-full font-bold hover:bg-blue-700 transition">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <div class="relative z-10 hidden md:block">
                <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=800" class="rounded-2xl shadow-2xl border-4 border-white/20 w-full object-cover h-[350px]">
            </div>
        </div>
    </header>

    <section class="py-8 bg-gray-50 border-b">
        <div class="container mx-auto px-6">
            <div class="flex flex-wrap justify-center gap-4">

                <!-- Tombol Semua -->
                <a href="{{ url('/') }}" class="px-6 py-2 rounded-full font-bold transition {{ !request('category') ? 'bg-blue-600 text-white shadow-lg' : 'bg-white text-gray-600 hover:bg-gray-100 border' }}">
                    Semua
                </a>

                <!-- Loop Kategori dari Database -->
                @foreach($categories as $cat)
                    <a href="{{ url('/?category=' . $cat->name) }}" class="px-6 py-2 rounded-full font-bold transition {{ request('category') == $cat->name ? 'bg-blue-600 text-white shadow-lg' : 'bg-white text-gray-600 hover:bg-gray-100 border' }}">
                        {{ $cat->name }}
                    </a>
                @endforeach

            </div>
        </div>
    </section>

    <!-- PRODUCT LIST -->
    <section class="py-12 bg-gray-50 min-h-screen">
        <div class="container mx-auto px-6">

            @if(request('search') || request('category'))
                <h3 class="text-xl font-bold text-gray-700 mb-6">🔍 Hasil pencarian: "{{ request('search') ?? request('category') }}"</h3>
            @endif

            <div class="grid md:grid-cols-3 gap-8">
                @forelse($products as $product)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:-translate-y-2 transition duration-300 flex flex-col h-full">
                    <div class="relative h-56">
                        <img src="{{ asset('storage/products/' . $product->image) }}" class="w-full h-full object-cover">
                        <span class="absolute top-4 left-4 bg-white/90 text-gray-800 text-xs font-bold px-3 py-1 rounded-full backdrop-blur-sm shadow">
                            {{ $product->category }}
                        </span>
                        @if($product->stock < 1)
                            <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                                <span class="bg-red-600 text-white px-4 py-1 rounded-full font-bold transform -rotate-12">HABIS</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold text-gray-900">{{ $product->name }}</h3>
                        </div>
                        <p class="text-gray-500 text-sm mb-4 flex-grow">{{ Str::limit($product->description, 80) }}</p>

                        <div class="flex justify-between items-center mt-auto border-t pt-4">
                            <span class="text-xl font-bold text-blue-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>

                            <!-- TOMBOL ADD TO CART -->
                            @auth
                                @if($product->stock > 0)
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-blue-100 text-blue-600 px-4 py-2 rounded-lg font-bold text-sm hover:bg-blue-600 hover:text-white transition flex items-center gap-2">
                                        <i class="fas fa-cart-plus"></i> + Keranjang
                                    </button>
                                </form>
                                @else
                                    <button disabled class="bg-gray-100 text-gray-400 px-4 py-2 rounded-lg font-bold text-sm cursor-not-allowed">Habis</button>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="bg-gray-100 text-gray-600 px-4 py-2 rounded-lg font-bold text-sm hover:bg-gray-200 transition">
                                    Login
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-10">
                    <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-lg">Yah, kopi yang kamu cari nggak ketemu. Coba kata kunci lain ya! 🥺</p>
                    <a href="{{ url('/') }}" class="text-blue-600 font-bold hover:underline">Reset Filter</a>
                </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
