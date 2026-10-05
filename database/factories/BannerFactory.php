<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'judul' => fake()->sentence(3),
            'deskripsi' => fake()->sentence(),
            'gambar' => 'banners/'.fake()->word().'.jpg',
            'urutan' => fake()->numberBetween(0, 10),
            'is_active' => true,
        ];
    }
}
