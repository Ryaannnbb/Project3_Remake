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
        Schema::create('tb_detail_pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id')->nullable()->default(null)->constrained('tb_pesanan')->restrictOnDelete();
            $table->foreignId('produk_id')->constrained('tb_produk')->restrictOnDelete();
            $table->integer('jumlah');
            $table->integer('total');
            $table->enum('status', ['checkout', 'keranjang']);
            $table->timestamps();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_keranjang');
    }
};
