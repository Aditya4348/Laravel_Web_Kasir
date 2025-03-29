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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->double('harga_barang');
            $table->text('deskripsi_barang')->nullable();
            $table->string('foto_barang')->nullable();
            $table->integer('stok_barang')->nullable();
            $table->unsignedBigInteger('kategori_id'); // ID kategori

            // Foreign key ke tabel kategori
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');

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
