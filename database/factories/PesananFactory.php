<?php

namespace Database\Factories;

use App\Models\Mitra;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PesananFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'mitra_id' => Mitra::factory(),
            'tanggal_pesanan' => now()->toDateString(),
            'tanggal_sewa' => fake()->dateTimeBetween('+1 day', '+30 days')->format('Y-m-d'),
            'jam_sewa' => '09:00:00',
            'total_harga' => 500000,
            'biaya_admin' => 5000,
            'status_pesanan' => 'menunggu_pembayaran',
        ];
    }
}