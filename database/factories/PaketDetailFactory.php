<?php

namespace Database\Factories;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaketDetailFactory extends Factory
{
    public function definition(): array
    {
        return [
            'paket_id' => Produk::factory(),
            'produk_id' => Produk::factory(),
            'jumlah' => 1,
        ];
    }
}
