<?php

namespace Database\Factories;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

class FasilitasFactory extends Factory
{
    public function definition(): array
    {
        return [
            'produk_id' => Produk::factory(),
            'nama_fasilitas' => fake()->words(2, true),
            'tipe' => 'include',
        ];
    }
}
