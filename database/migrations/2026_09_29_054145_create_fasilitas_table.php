<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id('fasilitas_id');
            $table->foreignId('produk_id')->constrained('produks', 'produk_id')->onDelete('cascade');
            $table->string('nama_fasilitas');
            $table->string('icon')->nullable();
            $table->enum('tipe', ['include', 'exclude', 'ruangan'])->default('include');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fasilitas');
    }
};