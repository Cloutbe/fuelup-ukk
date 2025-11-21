<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Fuel Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Poppins', sans-serif; }</style>
</head>
<body class="bg-gray-50 h-screen flex flex-col">

    <!-- Navbar Sederhana -->
    <nav class="bg-white py-4 shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <div class="bg-blue-500 text-white p-2 rounded-lg"><i class="fas fa-mug-hot"></i></div>
                <span class="text-xl font-bold text-blue-600">FUEL UP</span>
            </div>
            <a href="{{ url('/') }}" class="text-sm text-gray-500 hover:text-blue-600 font-medium">Back to Home</a>
        </div>
    </nav>

    <!-- Register Card -->
    <div class="flex-grow flex items-center justify-center px-6 py-10">
        <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-xl border border-gray-100">
            
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Create Account</h2>
                <p class="text-gray-400 text-sm mt-1">Join our community for exclusive perks</p>
            </div>

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label class="block text-xs font-bold text-gray-700 mb-2 ml-1">Full Name</label>
                    <div class="flex items-center bg-gray-100 rounded-lg px-4 py-3 focus-within:border-blue-500 focus-within:bg-white border border-transparent transition">
                        <i class="fas fa-user text-gray-400 mr-3"></i>
                        <input type="text" name="name" placeholder="John Doe" class="bg-transparent w-full outline-none text-gray-600 text-sm" required>
                    </div>
                    @error('name') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-xs font-bold text-gray-700 mb-2 ml-1">Email</label>
                    <div class="flex items-center bg-gray-100 rounded-lg px-4 py-3 focus-within:border-blue-500 focus-within:bg-white border border-transparent transition">
                        <i class="fas fa-envelope text-gray-400 mr-3"></i>
                        <input type="email" name="email" placeholder="you@example.com" class="bg-transparent w-full outline-none text-gray-600 text-sm" required>
                    </div>
                    @error('email') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="block text-xs font-bold text-gray-700 mb-2 ml-1">Password</label>
                    <div class="flex items-center bg-gray-100 rounded-lg px-4 py-3 focus-within:border-blue-500 focus-within:bg-white border border-transparent transition">
                        <i class="fas fa-lock text-gray-400 mr-3"></i>
                        <input type="password" name="password" placeholder="••••••" class="bg-transparent w-full outline-none text-gray-600 text-sm" required>
                    </div>
                    @error('password') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label class="block text-xs font-bold text-gray-700 mb-2 ml-1">Confirm Password</label>
                    <div class="flex items-center bg-gray-100 rounded-lg px-4 py-3 focus-within:border-blue-500 focus-within:bg-white border border-transparent transition">
                        <i class="fas fa-lock text-gray-400 mr-3"></i>
                        <input type="password" name="password_confirmation" placeholder="••••••" class="bg-transparent w-full outline-none text-gray-600 text-sm" required>
                    </div>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded-xl hover:bg-blue-700 transition shadow-lg shadow-blue-500/30 mb-6">
                    Register
                </button>

                <div class="text-center">
                    <p class="text-xs text-gray-400">Already have an account? <a href="{{ route('login') }}" class="text-blue-500 font-bold hover:underline">Sign In</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>