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
        Schema::create('tb_produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk', 100);
            $table->string('path_produk', 255);
            $table->integer('harga');
            $table->integer('stok');
            $table->text('deskripsi');
            $table->foreignId('kategori_id')->constrained('tb_kategori')->restrictOnDelete();
            $table->foreignId('supplier_id')->constrained('tb_supplier')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_produk');
    }
};
