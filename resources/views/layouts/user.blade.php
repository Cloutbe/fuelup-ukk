<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fuel Up - Coffee Shop')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
        .hero-gradient {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
    </style>

    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <!-- NAVBAR -->
    <nav class="bg-white py-4 shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center gap-2">
                <div class="bg-blue-500 text-white p-2 rounded-lg">
                    <i class="fas fa-mug-hot"></i>
                </div>
                <span class="text-xl font-bold text-blue-600">FUEL UP</span>
            </div>

            <!-- Links Tengah -->
            <div class="hidden md:flex space-x-8 font-medium text-gray-600 text-sm">
                <a href="{{ Auth::check() ? url('/') : url('/') }}" class="{{ request()->is('/') || request()->is('dashboard') ? 'text-blue-500 font-semibold' : 'hover:text-blue-500 transition' }}">Home</a>
                <a href="{{ url('/menu') }}" class="{{ request()->is('menu') ? 'text-blue-500 font-semibold' : 'hover:text-blue-500 transition' }}">Menu</a>
                <a href="{{ url('/about') }}" class="{{ request()->is('about') ? 'text-blue-500 font-semibold' : 'hover:text-blue-500 transition' }}">About</a>
                <a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? 'text-blue-500 font-semibold' : 'hover:text-blue-500 transition' }}">Contact</a>
            </div>

            <!-- Menu Kanan (Kondisional) -->
            <div class="flex items-center gap-4">

                {{-- JIKA SUDAH LOGIN --}}
                @auth
                    <a href="{{ route('orders.index') }}" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition text-sm font-medium mr-2">
                        <i class="fas fa-clipboard-list text-lg"></i>
                        <span class="hidden md:inline">Orders</span>
                    </a>

                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition text-sm font-medium mr-2" title="Profil Saya">
                        <i class="fas fa-user-circle text-lg"></i>
                        <span class="hidden md:inline">Profil</span>
                    </a>

                    <a href="{{ url('/cart') }}" class="relative text-gray-600 hover:text-blue-600 transition mr-4">
                        <i class="fas fa-shopping-cart text-lg"></i>
                        <!-- Contoh badge statis, nanti bisa didinamiskan -->
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center">!</span>
                    </a>

                    <!-- Form Logout -->
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="border border-gray-300 text-gray-600 px-4 py-1.5 rounded-lg text-sm font-bold hover:bg-red-50 hover:text-red-500 hover:border-red-200 transition flex items-center gap-2">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                @endauth

                {{-- JIKA BELUM LOGIN (GUEST) --}}
                @guest
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 font-medium text-sm transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-5 py-2 rounded-full font-bold text-sm hover:bg-blue-700 transition shadow-lg shadow-blue-500/30">
                        Register
                    </a>
                @endguest

            </div>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-[#1A1F2B] text-gray-400 py-12 mt-auto flex-none">
        <div class="container mx-auto px-6 grid md:grid-cols-4 gap-12 mb-8">
            <!-- Brand -->
            <div>
                <div class="flex items-center gap-2 mb-6">
                    <div class="bg-blue-600 text-white p-2 rounded-lg">
                        <i class="fas fa-mug-hot"></i>
                    </div>
                    <span class="text-xl font-bold text-white">FUEL UP</span>
                </div>
                <p class="text-sm leading-relaxed">
                    Your daily dose of premium coffee, crafted with passion and served with excellence.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-white font-bold mb-6">Quick Links</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="{{ url('/') }}" class="hover:text-blue-500 transition">Home</a></li>
                    <li><a href="{{ url('/menu') }}" class="hover:text-blue-500 transition">Menu</a></li>
                    <li><a href="{{ url('/about') }}" class="hover:text-blue-500 transition">About Us</a></li>
                    <li><a href="{{ url('/contact') }}" class="hover:text-blue-500 transition">Contact</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="text-white font-bold mb-6">Contact Us</h4>
                <ul class="space-y-4 text-sm">
                    <li class="flex items-center gap-3">
                        <i class="fas fa-map-marker-alt text-blue-500"></i>
                        <span>123 Coffee Street, Jakarta</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-phone text-blue-500"></i>
                        <span>+62 812-3456-7890</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-envelope text-blue-500"></i>
                        <span>hello@fuelup.com</span>
                    </li>
                </ul>
            </div>

            <!-- Follow Us -->
            <div>
                <h4 class="text-white font-bold mb-6">Follow Us</h4>
                <div class="flex gap-4 mb-6">
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 hover:text-white transition"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 hover:text-white transition"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 hover:text-white transition"><i class="fab fa-twitter"></i></a>
                </div>
                <p class="text-sm">Open Daily: 7:00 AM - 10:00 PM</p>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-8 text-center text-sm">
            <p>&copy; 2025 FUEL UP Coffee Shop. All rights reserved.</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
