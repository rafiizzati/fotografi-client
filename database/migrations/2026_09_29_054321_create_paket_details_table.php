<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paket_details', function (Blueprint $table) {
            $table->id('paket_detail_id');
            $table->foreignId('paket_id')->constrained('produks', 'produk_id')->onDelete('cascade');
            $table->foreignId('produk_id')->constrained('produks', 'produk_id')->onDelete('cascade');
            $table->integer('jumlah')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paket_details');
    }
};