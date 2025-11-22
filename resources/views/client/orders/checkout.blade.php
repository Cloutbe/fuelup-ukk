@extends('layouts.user')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="md:flex">
            <!-- Bagian Gambar Produk -->
            <div class="md:w-1/2">
                <img class="h-full w-full object-cover" src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}">
            </div>

            <!-- Bagian Form -->
            <div class="md:w-1/2 p-8">
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Konfirmasi Pesanan</div>
                <h1 class="block mt-1 text-2xl leading-tight font-bold text-gray-900">{{ $product->name }}</h1>
                <p class="mt-2 text-gray-600">{{ $product->description }}</p>
                <p class="mt-4 text-3xl font-bold text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                <hr class="my-6 border-gray-200">

                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <!-- Input Jumlah -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="quantity">
                            Jumlah Pesanan
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="quantity" name="quantity" type="number" min="1" value="1" required>
                    </div>

                    <!-- GANTI INPUT ALAMAT JADI NOMOR MEJA (UPDATED) -->
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="table_number">
                            Nomor Meja
                        </label>
                        <input type="text"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline font-bold text-lg"
                               id="table_number"
                               name="table_number"
                               placeholder="Contoh: Meja 05"
                               required>
                        <p class="text-xs text-gray-500 mt-1">*Lihat nomor yang tertera di mejamu ya!</p>

                        @error('table_number')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline transition duration-300 w-full" type="submit">
                            Pesan & Bayar 🚀
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
