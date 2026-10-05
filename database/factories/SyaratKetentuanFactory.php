<?php

namespace Database\Factories;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

class SyaratKetentuanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'produk_id' => Produk::factory(),
            'isi_syarat' => fake()->sentence(),
            'urutan' => 1,
        ];
    }
}
