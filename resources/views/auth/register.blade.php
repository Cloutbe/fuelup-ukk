<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Fuel Up Coffee</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center p-4">

    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden flex w-full max-w-4xl h-[550px]">

        <!-- BAGIAN KIRI: GAMBAR -->
        <div class="hidden md:block w-1/2 bg-cover bg-center relative" style="background-image: url('https://images.unsplash.com/photo-1511537632536-b71c2744258e?w=800');">
            <div class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center text-white text-center p-8">
                <h2 class="text-3xl font-bold mb-2">Join Community</h2>
                <p class="text-sm opacity-90">Dapatkan promo eksklusif dan kemudahan memesan kopi favoritmu.</p>
            </div>
        </div>

        <!-- BAGIAN KANAN: FORM REGISTER -->
        <div class="w-full md:w-1/2 p-8 md:p-10 flex flex-col justify-center relative overflow-y-auto">

            <a href="{{ route('home') }}" class="absolute top-4 right-4 text-gray-400 hover:text-blue-600 transition">
                <i class="fas fa-times text-xl"></i>
            </a>

            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Buat Akun Baru</h1>
                <p class="text-sm text-gray-500">Gratis dan hanya butuh 1 menit!</p>
            </div>

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <!-- Nama -->
                <div class="mb-3">
                    <label class="block text-gray-700 text-xs font-bold mb-1 uppercase tracking-wide">Nama Lengkap</label>
                    <input type="text" name="name" class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Nama Anda" required value="{{ old('name') }}">
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="block text-gray-700 text-xs font-bold mb-1 uppercase tracking-wide">Email Address</label>
                    <input type="email" name="email" class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 outline-none" placeholder="nama@email.com" required value="{{ old('email') }}">
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="block text-gray-700 text-xs font-bold mb-1 uppercase tracking-wide">Password</label>
                    <input type="password" name="password" class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Minimal 8 karakter" required>
                    @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-xs font-bold mb-1 uppercase tracking-wide">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Ulangi password" required>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition shadow-lg shadow-blue-500/30">
                    Daftar Sekarang
                </button>
            </form>

            <div class="mt-6 text-center text-sm">
                <p class="text-gray-500">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 font-bold hover:underline">Login di sini</a></p>
            </div>

        </div>
    </div>

</body>
</html>
