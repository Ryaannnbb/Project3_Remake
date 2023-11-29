<?php

use Carbon\Carbon;
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
        Schema::create('tb_pengiriman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id')->constrained('tb_pesanan')->cascadeOnDelete();
            $table->date('tanggal_pengiriman')->default(Carbon::now());
            $table->date('tanggal_menerima')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pengiriman');
    }
};
