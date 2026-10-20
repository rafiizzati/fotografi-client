<?php

namespace Database\Factories;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class KeranjangFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'produk_id' => Produk::factory(),
            'jumlah' => 1,
            'tanggal_sewa' => fake()->dateTimeBetween('+1 day', '+30 days')->format('Y-m-d'),
            'jam_sewa' => '09:00:00',
        ];
    }
}