<?php

namespace Database\Factories;

use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PembayaranFactory extends Factory
{
    public function definition(): array
    {
        return [
            'pesanan_id' => Pesanan::factory(),
            'metode_pembayaran' => 'qris',
            'qr_reference_id' => fake()->uuid(),
            'jumlah_bayar' => 505000,
            'status_pembayaran' => 'pending',
        ];
    }
}
