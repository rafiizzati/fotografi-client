<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id('pembayaran_id');
            $table->foreignId('pesanan_id')->constrained('pesanans', 'pesanan_id')->onDelete('cascade');
            $table->string('metode_pembayaran');
            $table->string('qr_code')->nullable();
            $table->string('qr_reference_id')->nullable();
            $table->dateTime('qr_expired_at')->nullable();
            $table->integer('jumlah_bayar');
            $table->enum('status_pembayaran', [
                'pending',
                'berhasil',
                'gagal',
                'kadaluarsa',
                'refund'
            ])->default('pending');
            $table->string('bukti_bayar')->nullable();
            $table->dateTime('waktu_bayar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};