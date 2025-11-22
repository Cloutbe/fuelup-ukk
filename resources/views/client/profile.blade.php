@extends('layouts.user')

@section('title', 'Profil Saya')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">

        <div class="bg-blue-600 px-8 py-6 text-white flex items-center gap-4">
            <div class="h-16 w-16 bg-white rounded-full flex items-center justify-center text-blue-600 font-bold text-2xl">
                {{ substr($user->name, 0, 1) }}
            </div>
            <div>
                <h2 class="text-2xl font-bold">Halo, {{ $user->name }}! 👋</h2>
                <p class="text-blue-100 text-sm">{{ $user->email }}</p>
            </div>
        </div>

        <div class="p-8">

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded mb-6 border-l-4 border-green-500">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <h3 class="text-gray-800 font-bold text-lg mb-4 border-b pb-2">✏️ Edit Data Diri</h3>

                <!-- Nama -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <h3 class="text-gray-800 font-bold text-lg mb-4 border-b pb-2 mt-8">🔒 Ganti Password (Opsional)</h3>
                <p class="text-xs text-gray-500 mb-4">Kosongkan jika tidak ingin mengganti password.</p>

                <!-- Password Baru -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Password Baru</label>
                    <input type="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Minimal 8 karakter">
                    @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-8">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Ulangi Password Baru</label>
                    <input type="password" name="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ketik ulang password baru">
                </div>

                <div class="flex justify-end gap-4">
                    <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-700 font-bold py-2 px-4">Batal</a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition shadow-lg shadow-blue-500/30">
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
