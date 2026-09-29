<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rekenings', function (Blueprint $table) {
            $table->id('rekening_id');
            $table->foreignId('mitra_id')->constrained('mitras', 'mitra_id')->onDelete('cascade');
            $table->string('nama_bank');
            $table->string('nomor_rekening');
            $table->string('nama_pemilik');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rekenings');
    }
};