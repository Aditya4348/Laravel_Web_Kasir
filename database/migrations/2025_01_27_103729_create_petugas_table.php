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
        Schema::create('petugas', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50); // Kolom nama
            $table->string('no_telepon', 12); // Kolom no_telepon
            $table->text('alamat'); // Kolom alamat
            $table->string('username',20)->unique(); // Kolom username
            $table->enum('role',['admin', 'petugas'])->default('petugas'); // Kolom username
            $table->string('password',100); // Kolom password
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};
