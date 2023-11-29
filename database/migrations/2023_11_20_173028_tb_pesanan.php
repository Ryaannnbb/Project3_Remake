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
            $table->foreignId('user_id')->constrained('users')->restrictOnDelete();
            $table->integer('total');
            $table->enum('status', ['menunggu', 'diterima','dibayar', 'menunggu dibayar', 'ditolak', 'dikirim', 'sampai', 'selesai'])->default('menunggu');
            $table->string('pesan_tolak')->default('');
            $table->string('metode_pembayaran')->default('');
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
