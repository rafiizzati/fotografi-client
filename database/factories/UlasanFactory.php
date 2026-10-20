<?php

namespace Database\Factories;

use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UlasanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'pesanan_id' => Pesanan::factory(),
            'user_id' => User::factory(),
            'produk_id' => Produk::factory(),
            'rating' => fake()->numberBetween(3, 5),
            'komentar' => fake()->sentence(),
            'tanggal_ulasan' => now()->toDateString(),
        ];
    }
}