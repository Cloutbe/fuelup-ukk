@extends('layouts.user')  {{-- Memanggil Layout --}}

@section('title', 'Home - Fuel Up') {{-- Mengubah Judul Tab Browser --}}

@section('content')
    <header class="header-bg text-white py-24 relative z-10 text-center bg-gradient-to-r from-blue-500 to-blue-300">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">About FUEL UP</h1>
            <p class="text-lg md:text-xl opacity-90 max-w-2xl mx-auto">
                We're more than just a coffee shop – we're a community of coffee lovers dedicated to delivering the perfect cup, every time.
            </p>
        </div>
    </header>

    <section class="py-20 container mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Our Story</h2>
                <div class="space-y-4 text-gray-600 leading-relaxed text-justify">
                    <p>
                        Founded in 2020, FUEL UP began with a simple mission: to serve exceptional coffee that fuels your day and brings people together. What started as a small neighborhood cafe has grown into a beloved community gathering place.
                    </p>
                    <p>
                        We source our beans from sustainable farms around the world, working directly with farmers who share our commitment to quality and environmental responsibility. Every cup we serve is a testament to our dedication to excellence.
                    </p>
                    <p>
                        Our expert baristas are trained in the art and science of coffee making, ensuring that each beverage is crafted to perfection. Whether you're a coffee connoisseur or just beginning your coffee journey, we're here to fuel your passion.
                    </p>
                </div>
            </div>
            
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=800" alt="Our Coffee Shop Interior" class="rounded-3xl shadow-2xl w-full object-cover h-[400px]">
                <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-blue-100 rounded-full -z-10"></div>
                <div class="absolute -top-4 -left-4 w-24 h-24 bg-blue-50 rounded-full -z-10"></div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Our Values</h2>
                <p class="text-gray-500">What makes FUEL UP special</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($values as $val)
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition text-center">
                    <div class="w-16 h-16 mx-auto {{ $val['bg'] }} {{ $val['color'] }} rounded-xl flex items-center justify-center text-3xl mb-6">
                        <i class="fas fa-{{ $val['icon'] }}"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $val['title'] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        {{ $val['desc'] }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-20 container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Meet Our Team</h2>
            <p class="text-gray-500">The passionate people behind your favorite coffee</p>
        </div>

        <div class="grid md:grid-cols-3 gap-10 max-w-5xl mx-auto">
            @foreach($team as $member)
            <div class="text-center group">
                <div class="overflow-hidden rounded-2xl mb-6 shadow-lg relative">
                    <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="w-full h-80 object-cover group-hover:scale-105 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                </div>
                <h3 class="text-xl font-bold text-gray-900">{{ $member['name'] }}</h3>
                <p class="text-blue-500 font-medium text-sm">{{ $member['role'] }}</p>
            </div>
            @endforeach
        </div>
    </section>
@endsection