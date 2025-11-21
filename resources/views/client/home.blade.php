@extends('layouts.user')  {{-- Memanggil Layout --}}

@section('title', 'Home - Fuel Up') {{-- Mengubah Judul Tab Browser --}}

@section('content')
    <header class="hero-gradient text-white relative overflow-hidden">
        <div class="container mx-auto px-6 py-16 md:py-24 grid md:grid-cols-2 gap-12 items-center">
            
            <div class="z-10">
                <span class="bg-white/20 px-3 py-1 rounded-full text-sm font-semibold mb-4 inline-block backdrop-blur-sm">
                    ☕ Premium Coffee Experience
                </span>
                <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">
                    FUEL UP Your Day <br> with Perfect Coffee
                </h1>
                <p class="text-lg text-blue-50 mb-8 max-w-md">
                    Handcrafted coffee made with passion. Experience the perfect blend of quality beans and expert brewing.
                </p>
                
                <div class="flex gap-4">
                    <a href="#" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-bold hover:bg-gray-100 transition shadow-lg">
                        Explore Menu <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <div class="flex items-center gap-2">
                        <div class="flex -space-x-2">
                            <div class="w-10 h-10 rounded-full bg-gray-300 border-2 border-white"></div>
                            <div class="w-10 h-10 rounded-full bg-gray-400 border-2 border-white"></div>
                            <div class="w-10 h-10 rounded-full bg-gray-500 border-2 border-white flex items-center justify-center text-xs text-white">500+</div>
                        </div>
                        <div class="text-sm">
                            <span class="block font-bold">4.9 Stars</span>
                            <span class="text-blue-100 text-xs">Customer Rating</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative z-10">
                <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=800" alt="Coffee Shop Interior" class="rounded-2xl shadow-2xl border-4 border-white/20 w-full object-cover h-[400px]">
                
                <div class="absolute bottom-6 left-6 bg-white text-gray-800 p-4 rounded-xl shadow-lg flex items-center gap-3">
                    <div class="bg-green-100 text-green-600 p-2 rounded-full">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-bold">Open Now</p>
                        <p class="text-sm font-bold">07:00 AM - 10:00 PM</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="py-16 container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-2xl font-bold text-gray-800">Browse by Category</h2>
            <p class="text-gray-500">Discover your perfect cup</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach(['Hot Coffee' => 'mug-hot', 'Cold Coffee' => 'snowflake', 'Specialty' => 'star', 'Pastries' => 'bread-slice'] as $cat => $icon)
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition text-center group cursor-pointer border border-gray-100">
                <div class="w-14 h-14 mx-auto bg-blue-50 text-blue-500 rounded-full flex items-center justify-center text-2xl mb-4 group-hover:bg-blue-500 group-hover:text-white transition">
                    <i class="fas fa-{{ $icon }}"></i>
                </div>
                <h3 class="font-bold text-gray-700">{{ $cat }}</h3>
            </div>
            @endforeach
        </div>
    </section>

    <section class="container mx-auto px-6 mb-16">
        <div class="bg-[#FFF8F0] rounded-2xl p-8 md:p-12 flex flex-col md:flex-row items-center justify-between relative overflow-hidden">
            <div class="md:w-1/2 z-10">
                <span class="text-orange-500 font-bold text-sm uppercase tracking-wider">Limited Time Offer</span>
                <h2 class="text-3xl font-bold text-gray-900 mt-2 mb-4">Get 20% Off Your First Order</h2>
                <p class="text-gray-600 mb-6">Join our community and enjoy exclusive discounts on premium coffee blends.</p>
                <button class="bg-blue-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-blue-700 transition">
                    Order Now
                </button>
            </div>
            <div class="md:w-1/2 mt-8 md:mt-0 flex justify-end relative z-10">
                 <img src="https://images.unsplash.com/photo-1511537632536-b71c2744258e?w=600" alt="Coffee Beans" class="rounded-full w-64 h-64 object-cover border-4 border-white shadow-xl">
            </div>
            <div class="absolute right-0 top-0 h-full w-1/3 bg-gray-900 skew-x-12 translate-x-20 z-0"></div>
        </div>
    </section>

    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Trending This Week</h2>
                <p class="text-gray-500">Most popular items on our menu</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
              <!-- @php
    $trendingProducts = [
        [
            'name' => 'Espresso',
            'desc' => 'Rich and bold espresso shot',
            'price' => 3.50,
            'rating' => 5,
            'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?w=400'
        ],
        [
            'name' => 'Cappuccino',
            'desc' => 'Espresso with steamed milk and foam',
            'price' => 4.50,
            'rating' => 5,
            'image' => 'https://images.unsplash.com/photo-1572442388796-11668a67e53d?w=400'
        ],
        [
            'name' => 'Latte Art',
            'desc' => 'Smooth latte with beautiful art',
            'price' => 5.00,
            'rating' => 5,
            'image' => 'https://images.unsplash.com/photo-1551024601-5602474dd411?w=400'
        ]
    ];
@endphp -->
                @foreach($trendingProducts as $product)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:-translate-y-2 transition duration-300">
                    <div class="relative">
                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-56 object-cover">
                        <span class="absolute top-4 right-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full">Trending</span>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold text-gray-900">{{ $product['name'] }}</h3>
                            <span class="flex text-yellow-400 text-sm">
                                @for($i=0; $i < $product['rating']; $i++) <i class="fas fa-star"></i> @endfor
                            </span>
                        </div>
                        <p class="text-gray-500 text-sm mb-4">{{ $product['desc'] }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-blue-600">${{ number_format($product['price'], 2) }}</span>
                            <button class="bg-blue-100 text-blue-600 px-4 py-2 rounded-lg font-bold text-sm hover:bg-blue-600 hover:text-white transition">
                                Order Now
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                 <button class="border border-gray-300 text-gray-600 px-6 py-2 rounded-full font-medium hover:border-blue-500 hover:text-blue-500 transition">
                    View Full Menu <i class="fas fa-arrow-right ml-1"></i>
                 </button>
            </div>
        </div>
    </section>
@endsection