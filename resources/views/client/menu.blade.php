@extends('layouts.user')  {{-- Memanggil Layout --}}

@section('title', 'Home - Fuel Up') {{-- Mengubah Judul Tab Browser --}}

@section('content')
    <main class="flex-grow container mx-auto px-6 py-8">
        
        <div class="flex flex-wrap gap-4 mb-8">
            @foreach($categories as $index => $cat)
                <button class="{{ $index === 0 ? 'bg-blue-600 text-white border-blue-600' : 'bg-white text-gray-600 border-gray-200 hover:border-blue-400' }} px-6 py-2 rounded-full text-sm font-semibold border transition shadow-sm">
                    {{ $cat }}
                </button>
            @endforeach
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            
            @foreach($products as $product)
            <div class="bg-white rounded-xl p-4 shadow-sm hover:shadow-lg transition duration-300 border border-gray-100">
                
                <div class="relative mb-4">
                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-48 object-cover rounded-lg">
                    <span class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm text-blue-600 text-[10px] font-bold px-2 py-1 rounded-md shadow-sm uppercase tracking-wide">
                        {{ $product['tag'] }}
                    </span>
                </div>

                <div>
                    <div class="flex text-yellow-400 text-xs mb-2">
                        @for($i=0; $i < $product['rating']; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                        <span class="text-gray-400 ml-1">({{ number_format($product['rating'], 1) }})</span>
                    </div>

                    <h3 class="font-bold text-gray-900 text-lg">{{ $product['name'] }}</h3>
                    <p class="text-gray-500 text-xs mb-4 min-h-[32px]">{{ $product['desc'] }}</p>

                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-blue-600">${{ number_format($product['price'], 2) }}</span>
                        
                        <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded-lg shadow-blue-500/30 shadow-md transition flex items-center gap-2 text-sm font-medium">
                            <i class="fas fa-shopping-cart text-xs"></i> Add
                        </button>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </main>
@endsection