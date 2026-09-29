<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id('produk_id');
            $table->foreignId('mitra_id')->constrained('mitras', 'mitra_id')->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('kategoris', 'kategori_id')->onDelete('cascade');
            $table->string('nama_produk');
            $table->text('deskripsi')->nullable();
            $table->text('spesifikasi')->nullable();
            $table->integer('harga');
            $table->enum('satuan_harga', ['per_hari', 'per_jam', 'per_paket', 'per_sesi'])->default('per_hari');
            $table->integer('stok')->default(1);
            $table->string('foto_produk')->nullable();
            $table->string('tipe_produk')->nullable();
            $table->boolean('is_paket')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};