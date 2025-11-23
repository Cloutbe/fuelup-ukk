@extends('layouts.user')

@section('title', 'Daftar Menu Lengkap')

@section('content')
<!-- Header Menu -->
<div class="bg-white border-b border-gray-200 sticky top-[72px] z-30 shadow-sm">
    <div class="container mx-auto px-6 py-4">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">

            <!-- Filter Kategori -->
            <div class="flex overflow-x-auto pb-2 md:pb-0 gap-2 w-full md:w-auto no-scrollbar">
                <a href="{{ route('menu') }}" class="px-4 py-1.5 rounded-full text-sm font-bold whitespace-nowrap transition {{ !request('category') ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                    Semua
                </a>
                @foreach($categories as $cat)
                    <a href="{{ route('menu', ['category' => $cat->name]) }}" class="px-4 py-1.5 rounded-full text-sm font-bold whitespace-nowrap transition {{ request('category') == $cat->name ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </div>

            <!-- Search Bar -->
            <form action="{{ route('menu') }}" method="GET" class="w-full md:w-64 relative">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari menu..." class="w-full pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:border-blue-500 text-sm">
                <i class="fas fa-search absolute left-3 top-2.5 text-gray-400 text-sm"></i>
            </form>
        </div>
    </div>
</div>

<!-- Product Grid -->
<div class="bg-gray-50 min-h-screen py-8">
    <div class="container mx-auto px-6">

        @if(request('search'))
            <p class="mb-6 text-gray-600">Menampilkan hasil pencarian: <strong>"{{ request('search') }}"</strong></p>
        @endif

        <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($products as $product)
            <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition duration-300 flex flex-col overflow-hidden group">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('storage/products/' . $product->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    @if($product->stock < 1)
                        <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                            <span class="bg-red-600 text-white px-3 py-1 rounded-full text-xs font-bold">HABIS</span>
                        </div>
                    @endif
                </div>
                <div class="p-4 flex-grow flex flex-col">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <span class="text-[10px] font-bold text-blue-500 uppercase tracking-wider">{{ $product->category }}</span>
                            <h3 class="font-bold text-gray-800 text-lg leading-tight">{{ $product->name }}</h3>
                        </div>
                    </div>
                    <p class="text-gray-500 text-xs mb-4 line-clamp-2">{{ $product->description }}</p>

                    <div class="flex justify-between items-center mt-auto pt-3 border-t border-gray-100">
                        <span class="font-bold text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</span>

                        @auth
                            @if($product->stock > 0)
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </form>
                            @else
                                <button disabled class="text-gray-300"><i class="fas fa-ban"></i></button>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="text-blue-500 text-xs hover:underline">Login</a>
                        @endauth
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-20">
                <div class="inline-block p-4 rounded-full bg-gray-100 mb-4 text-gray-400">
                    <i class="fas fa-mug-hot text-4xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-600">Menu Tidak Ditemukan</h3>
                <p class="text-gray-500">Coba cari dengan kata kunci lain ya.</p>
                <a href="{{ route('menu') }}" class="mt-4 inline-block text-blue-600 font-bold hover:underline">Lihat Semua Menu</a>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $products->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection
