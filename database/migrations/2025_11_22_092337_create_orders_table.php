<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Siapa yang pesan
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Pesan apa (Langsung beli 1 jenis dulu biar simpel)
            $table->integer('quantity'); // Berapa banyak
            $table->decimal('total_price', 10, 2); // Total bayar
            $table->string('table_number');
            $table->enum('status', ['pending', 'awaiting_payment', 'paid', 'done', 'cancelled'])->default('pending');
            $table->string('payment_proof')->nullable(); // File bukti transfer
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
