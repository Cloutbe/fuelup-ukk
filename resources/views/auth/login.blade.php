<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Fuel Up Coffee</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center p-4">

    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden flex w-full max-w-4xl h-[500px]">

        <!-- BAGIAN KIRI: GAMBAR (Hidden di HP) -->
        <div class="hidden md:block w-1/2 bg-cover bg-center relative" style="background-image: url('https://images.unsplash.com/photo-1497935586351-b67a49e012bf?w=800');">
            <div class="absolute inset-0 bg-black/40 flex flex-col justify-center items-center text-white text-center p-8">
                <h2 class="text-3xl font-bold mb-2">Welcome Back!</h2>
                <p class="text-sm opacity-90">Nikmati secangkir kopi terbaik untuk menemani harimu yang produktif.</p>
            </div>
        </div>

        <!-- BAGIAN KANAN: FORM LOGIN -->
        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center relative">

            <!-- Tombol Kembali -->
            <a href="{{ route('home') }}" class="absolute top-4 right-4 text-gray-400 hover:text-blue-600 transition">
                <i class="fas fa-times text-xl"></i>
            </a>

            <div class="text-center mb-8">
                <div class="inline-block p-3 rounded-full bg-blue-50 text-blue-600 mb-3">
                    <i class="fas fa-mug-hot text-2xl"></i>
                </div>
                <h1 class="text-2xl font-bold text-gray-800">Login Member</h1>
                <p class="text-sm text-gray-500">Masuk untuk mulai memesan</p>
            </div>

            <form action="{{ route('login') }}" method="POST">
                @csrf

                @if(session('error'))
                    <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-sm text-center">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-xs font-bold mb-2 uppercase tracking-wide">Email Address</label>
                    <div class="flex items-center border rounded-lg px-3 py-2 focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-transparent transition">
                        <i class="fas fa-envelope text-gray-400 mr-3"></i>
                        <input type="email" name="email" class="w-full outline-none text-sm text-gray-700" placeholder="nama@email.com" required value="{{ old('email') }}">
                    </div>
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-xs font-bold mb-2 uppercase tracking-wide">Password</label>
                    <div class="flex items-center border rounded-lg px-3 py-2 focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-transparent transition">
                        <i class="fas fa-lock text-gray-400 mr-3"></i>
                        <input type="password" name="password" class="w-full outline-none text-sm text-gray-700" placeholder="********" required>
                    </div>
                    @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition shadow-lg shadow-blue-500/30">
                    Masuk Sekarang
                </button>
            </form>

            <div class="mt-6 text-center text-sm">
                <p class="text-gray-500">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 font-bold hover:underline">Daftar di sini</a></p>
            </div>

        </div>
    </div>

</body>
</html>
