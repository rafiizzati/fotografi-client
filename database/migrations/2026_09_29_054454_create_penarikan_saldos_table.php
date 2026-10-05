<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penarikan_saldos', function (Blueprint $table) {
            $table->id('penarikan_id');
            $table->foreignId('mitra_id')->constrained('mitras', 'mitra_id')->onDelete('cascade');
            $table->foreignId('rekening_id')->constrained('rekenings', 'rekening_id')->onDelete('cascade');
            $table->integer('jumlah');
            $table->enum('status', ['pending', 'diproses', 'berhasil', 'gagal'])->default('pending');
            $table->dateTime('tanggal_penarikan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penarikan_saldos');
    }
};
