<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // 1. Tambah Kategori di Produk
        Schema::table('products', function (Blueprint $table) {
            $table->string('category')->default('Coffee')->after('name');
        });

        // 2. Buat Tabel Keranjang (Temporary)
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });

        // 3. Buat Tabel Detail Item Order (Final)
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('price', 10, 2); // Harga saat dibeli
            $table->timestamps();
        });

        // 4. Update Tabel Orders (Hapus kolom lama yg tidak dipakai)
        Schema::table('orders', function (Blueprint $table) {
            // Kita drop foreign key dulu biar gak error
            $table->dropForeign(['product_id']);
            $table->dropColumn(['product_id', 'quantity']);
        });
    }

    public function down()
    {
        // Rollback logic (Sederhana saja untuk UKK)
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('carts');
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
};
