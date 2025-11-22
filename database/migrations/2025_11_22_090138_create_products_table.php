<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama Kopi
            $table->text('description')->nullable(); // Deskripsi rasa/detail
            $table->decimal('price', 10, 2); // Harga (pakai decimal biar presisi)
            $table->integer('stock'); // Stok tersedia
            $table->string('image')->nullable(); // Path foto produk
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
