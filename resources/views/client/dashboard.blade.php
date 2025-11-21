@extends('layouts.user')  {{-- Memanggil Layout --}}

@section('title', 'Home - Fuel Up') {{-- Mengubah Judul Tab Browser --}}

@section('content')
    <header class="hero-gradient text-white relative overflow-hidden">
        <div class="container mx-auto px-6 py-16 md:py-24 grid md:grid-cols-2 gap-12 items-center">
            <div class="z-10">
                <span class="bg-white/20 px-3 py-1 rounded-full text-sm font-semibold mb-4 inline-block backdrop-blur-sm">
                    <i class="fas fa-check-circle mr-1"></i> Premium coffee experience
                </span>
                <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">
                    FUEL UP Your Day <br> with Perfect Coffee
                </h1>
                <p class="text-lg text-blue-50 mb-8 max-w-md">
                    Handcrafted coffee made with passion. Experience the perfect blend of quality beans and expert brewing.
                </p>
                
                <div class="flex gap-4">
                    <a href="{{ url('/menu') }}" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-bold hover:bg-gray-100 transition shadow-lg">
                        Explore Menu <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <div class="hidden md:flex bg-white/20 backdrop-blur-md rounded-lg px-4 py-2 items-center border border-white/30">
                        <i class="fas fa-search text-white/70 mr-2"></i>
                        <input type="text" placeholder="Search coffee..." class="bg-transparent border-none outline-none text-white placeholder-white/70 text-sm w-32">
                    </div>
                </div>
                
                <div class="mt-8 flex items-center gap-4 text-sm font-medium">
                    <div class="flex items-center gap-1 text-yellow-300">
                        <i class="fas fa-star"></i> 4.9
                    </div>
                    <span class="text-blue-100">Customer Rating</span>
                    <span class="text-blue-300">|</span>
                    <div class="flex items-center gap-1">
                        <i class="fas fa-clock"></i> 500+
                    </div>
                    <span class="text-blue-100">Orders Daily</span>
                </div>
            </div>

            <div class="relative z-10">
                <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=800" alt="Coffee Shop Interior" class="rounded-2xl shadow-2xl border-4 border-white/20 w-full object-cover h-[400px]">
                
                <div class="absolute bottom-6 left-6 bg-white text-gray-800 p-3 px-5 rounded-xl shadow-lg flex items-center gap-3">
                    <div class="bg-green-100 text-green-600 p-2 rounded-full w-8 h-8 flex items-center justify-center">
                        <i class="fas fa-clock text-xs"></i>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500 font-bold uppercase">Open Now</p>
                        <p class="text-xs font-bold">07:00 AM - 10:00 PM</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="py-12 container mx-auto px-6">
        <div class="text-center mb-10">
            <h2 class="text-2xl font-bold text-gray-800">Browse by Category</h2>
            <p class="text-gray-500 text-sm">Discover your perfect cup</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach(['Hot Coffee' => 'mug-hot', 'Cold Coffee' => 'snowflake', 'Specialty' => 'star', 'Pastries' => 'bread-slice'] as $cat => $icon)
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition text-center group cursor-pointer border border-gray-100">
                <div class="w-12 h-12 mx-auto bg-blue-50 text-blue-500 rounded-full flex items-center justify-center text-xl mb-4 group-hover:bg-blue-500 group-hover:text-white transition">
                    <i class="fas fa-{{ $icon }}"></i>
                </div>
                <h3 class="font-bold text-gray-700 text-sm">{{ $cat }}</h3>
            </div>
            @endforeach
        </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
        <div class="bg-[#FFF8F0] rounded-2xl p-8 md:p-10 flex flex-col md:flex-row items-center justify-between relative overflow-hidden border border-orange-100">
            <div class="md:w-1/2 z-10">
                <span class="text-orange-500 font-bold text-xs uppercase tracking-wider bg-orange-100 px-2 py-1 rounded mb-3 inline-block">Limited Time Offer</span>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Get 20% Off Your First Order</h2>
                <p class="text-gray-600 mb-6 text-sm">Join our community and enjoy exclusive discounts on premium coffee blends.</p>
                <button class="bg-blue-600 text-white px-6 py-2.5 rounded-lg font-bold text-sm hover:bg-blue-700 transition shadow-md shadow-blue-500/30">
                    Order Now <i class="fas fa-arrow-right ml-1"></i>
                </button>
            </div>
            <div class="md:w-1/2 mt-8 md:mt-0 flex justify-end relative z-10">
                <img src="https://images.unsplash.com/photo-1511537632536-b71c2744258e?w=600" alt="Coffee Beans" class="rounded-full w-48 h-48 object-cover border-4 border-white shadow-xl">
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-2xl font-bold text-gray-800">Trending This Week</h2>
                <p class="text-gray-500 text-sm">Most popular items on our menu</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach($trendingProducts as $product)
                <div class="bg-white rounded-2xl shadow-sm overflow-hidden hover:-translate-y-2 transition duration-300 group border border-gray-100">
                    <div class="relative">
                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-48 object-cover">
                        <span class="absolute top-3 right-3 bg-blue-600 text-white text-[10px] font-bold px-2 py-1 rounded shadow-md">Trending</span>
                    </div>
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-lg font-bold text-gray-900">{{ $product['name'] }}</h3>
                        </div>
                        <div class="flex text-yellow-400 text-xs mb-3">
                            @for($i=0; $i < $product['rating']; $i++) <i class="fas fa-star"></i> @endfor
                        </div>
                        <p class="text-gray-500 text-xs mb-4 line-clamp-2">{{ $product['desc'] }}</p>
                        <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                            <span class="text-lg font-bold text-blue-600">${{ number_format($product['price'], 2) }}</span>
                            <button class="bg-blue-600 text-white px-4 py-1.5 rounded-lg font-bold text-xs hover:bg-blue-700 transition">
                                Order Now
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-10">
                 <a href="{{ url('/menu') }}" class="bg-white border border-gray-200 text-gray-600 px-6 py-2 rounded-full text-sm font-medium hover:border-blue-500 hover:text-blue-500 transition shadow-sm inline-flex items-center gap-2">
                    View Full Menu <i class="fas fa-arrow-right"></i>
                 </a>
            </div>
        </div>
    </section>
@endsection