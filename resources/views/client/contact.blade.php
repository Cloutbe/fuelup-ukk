@extends('layouts.user')  {{-- Memanggil Layout --}}

@section('title', 'Home - Fuel Up') {{-- Mengubah Judul Tab Browser --}}

@section('content')
    <div class="bg-blue-600 py-20 text-center text-white">
        <h1 class="text-4xl font-bold mb-4">Get in Touch</h1>
        <p class="text-blue-100 max-w-xl mx-auto px-4">
            Have questions or feedback? We'd love to hear from you. Send us a message and we'll respond as soon as possible.
        </p>
    </div>

    <main class="container mx-auto px-6 -mt-10 mb-20">
        <div class="grid md:grid-cols-5 gap-8">
            
            <div class="md:col-span-3 bg-white rounded-2xl shadow-xl p-8 md:p-10">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Send us a Message</h2>
                
                <form action="#" method="POST">
                    @csrf <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Name</label>
                        <input type="text" placeholder="Your name" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 focus:bg-white transition">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                        <input type="email" placeholder="you@example.com" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 focus:bg-white transition">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Message</label>
                        <textarea rows="5" placeholder="How can we help you?" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 focus:bg-white transition"></textarea>
                    </div>

                    <button type="button" class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition shadow-lg shadow-blue-500/30">
                        <i class="fas fa-paper-plane mr-2"></i> Send Message
                    </button>
                </form>
            </div>

            <div class="md:col-span-2 space-y-6">
                
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Contact Information</h3>
                    
                    <div class="space-y-8">
                        @foreach($contactInfo as $info)
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 {{ $info['bg'] }} {{ $info['color'] }} rounded-full flex items-center justify-center text-xl shrink-0">
                                <i class="fas fa-{{ $info['icon'] }}"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 text-sm">{{ $info['title'] }}</h4>
                                @foreach($info['details'] as $detail)
                                    <p class="text-gray-500 text-sm">{{ $detail }}</p>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-gray-200 rounded-2xl h-48 flex items-center justify-center text-gray-500 shadow-inner">
                    <div class="text-center">
                        <i class="fas fa-map-marked-alt text-3xl mb-2"></i>
                        <p class="text-sm font-medium">Map View</p>
                        <p class="text-xs">123 Coffee Street, Jakarta</p>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection