<?php

namespace Database\Factories;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

class JadwalProdukFactory extends Factory
{
    public function definition(): array
    {
        return [
            'produk_id' => Produk::factory(),
            'tanggal' => fake()->dateTimeBetween('+1 day', '+30 days')->format('Y-m-d'),
            'jam_mulai' => '09:00:00',
            'jam_selesai' => '12:00:00',
            'status' => 'tersedia',
        ];
    }
}
