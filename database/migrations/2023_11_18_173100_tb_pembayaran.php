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
    Schema::create('tb_pembayaran', function (Blueprint $table) {
        $table->id();
        $table->string('pesanan', 100);
        $table->string('nama_pembayaran', 100);
        $table->enum('status_pembayaran', ['belum dibayar', 'dibayar'])->default('belum dibayar');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pembayaran');
    }
};
