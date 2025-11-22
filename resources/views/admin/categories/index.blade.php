@extends('layouts.admin')

@section('title', 'Kelola Kategori')

@section('content')
<div class="container mx-auto max-w-4xl">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- FORM TAMBAH KATEGORI -->
        <div class="bg-white rounded-lg shadow-md p-6 h-fit">
            <h3 class="text-xl font-bold text-gray-800 mb-4">➕ Tambah Kategori</h3>

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
                    <input type="text" name="name" class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500" placeholder="Contoh: Merchandise" required>
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg font-bold hover:bg-blue-700">Simpan</button>
            </form>
        </div>

        <!-- LIST KATEGORI -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-4 bg-gray-50 border-b">
                <h3 class="font-bold text-gray-800">Daftar Kategori</h3>
            </div>
            <table class="w-full text-left">
                <tbody class="divide-y divide-gray-100">
                    @forelse($categories as $cat)
                    <tr class="hover:bg-gray-50">
                        <td class="p-4">{{ $cat->name }}</td>
                        <td class="p-4 text-right">
                            <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Hapus kategori ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="p-4 text-center text-gray-500" colspan="2">Belum ada kategori.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
