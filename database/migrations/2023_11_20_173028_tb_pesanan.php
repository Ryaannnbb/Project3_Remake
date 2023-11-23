<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->restrictOnDelete();
            $table->foreignId('produk_id')->constrained('tb_produk')->restrictOnDelete();
            // $table->foreignId('pembayaran_id')->constrained('tb_pembayaran')->restrictOnDelete();
            $table->integer('jumlah');
            $table->integer('total');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pesanan');
    }
};
