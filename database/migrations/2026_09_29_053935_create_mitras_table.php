<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mitras', function (Blueprint $table) {
            $table->id('mitra_id');
            $table->string('nama_mitra');
            $table->text('deskripsi')->nullable();
            $table->string('alamat');
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->decimal('rating', 3, 2)->default(0);
            $table->integer('total_ulasan')->default(0);
            $table->string('jam_operasional')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mitras');
    }
};
