<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\Mitra;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdukFactory extends Factory
{
    public function definition(): array
    {
        return [
            'mitra_id' => Mitra::factory(),
            'kategori_id' => Kategori::factory(),
            'nama_produk' => fake()->words(3, true),
            'deskripsi' => fake()->sentence(),
            'harga' => fake()->numberBetween(5, 50) * 10000,
            'satuan_harga' => 'per_sesi',
            'stok' => 1,
            'is_paket' => false,
        ];
    }
}
