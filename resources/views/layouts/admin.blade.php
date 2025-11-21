<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Fuel Up')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gray-100 flex h-screen">

    <!-- SIDEBAR -->
    <aside class="bg-[#1A1F2B] text-gray-400 w-64 flex-shrink-0 hidden md:flex flex-col">
        <div class="h-16 flex items-center px-6 border-b border-gray-800 bg-[#131720]">
            <div class="text-white font-bold text-xl flex items-center gap-2">
                <i class="fas fa-mug-hot text-blue-500"></i> FUEL UP <span class="text-xs bg-blue-600 px-1.5 rounded text-white">Admin</span>
            </div>
        </div>
        
        <div class="flex-grow overflow-y-auto py-6 px-4 space-y-2">
            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 px-2">Main Menu</p>
            
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/30' : 'hover:bg-gray-800 hover:text-white transition' }}">
                <i class="fas fa-home w-5 text-center"></i> Dashboard
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-800 hover:text-white transition">
                <i class="fas fa-coffee w-5 text-center"></i> Products
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-800 hover:text-white transition">
                <i class="fas fa-shopping-bag w-5 text-center"></i> Orders <span class="ml-auto bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">3</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-800 hover:text-white transition">
                <i class="fas fa-users w-5 text-center"></i> Customers
            </a>
        </div>

        <div class="p-4 border-t border-gray-800">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full flex items-center justify-center gap-2 bg-gray-800 hover:bg-red-600 text-white py-2 rounded-lg transition">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN CONTENT WRAPPER -->
    <div class="flex-grow flex flex-col overflow-hidden">
        <!-- TOP HEADER -->
        <header class="h-16 bg-white shadow-sm flex items-center justify-between px-6">
            <button class="md:hidden text-gray-600 text-xl"><i class="fas fa-bars"></i></button>
            
            <div class="ml-auto flex items-center gap-4">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-bold text-gray-800">{{ Auth::user()->name ?? 'Admin' }}</p>
                    <p class="text-xs text-gray-500">Administrator</p>
                </div>
                <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-500">
                    <i class="fas fa-user"></i>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="flex-grow overflow-y-auto p-6">
            @yield('content')
        </main>
    </div>

</body>
</html>