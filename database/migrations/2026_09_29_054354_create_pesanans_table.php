<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id('pesanan_id');
            $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('cascade');
            $table->foreignId('mitra_id')->constrained('mitras', 'mitra_id')->onDelete('cascade');
            $table->foreignId('jadwal_id')->nullable()->constrained('jadwal_produks', 'jadwal_id')->onDelete('set null');
            $table->date('tanggal_pesanan');
            $table->date('tanggal_sewa');
            $table->time('jam_sewa');
            $table->integer('total_harga');
            $table->integer('biaya_admin')->default(0);
            $table->enum('status_pesanan', [
                'menunggu_pembayaran',
                'menunggu_konfirmasi',
                'dikonfirmasi',
                'berlangsung',
                'selesai',
                'dibatalkan'
            ])->default('menunggu_pembayaran');
            $table->text('catatan')->nullable();
            $table->string('metode_pengambilan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};