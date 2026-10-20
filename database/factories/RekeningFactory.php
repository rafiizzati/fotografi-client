<?php

namespace Database\Factories;

use App\Models\Mitra;
use Illuminate\Database\Eloquent\Factories\Factory;

class RekeningFactory extends Factory
{
    public function definition(): array
    {
        return [
            'mitra_id' => Mitra::factory(),
            'nama_bank' => fake()->randomElement(['BCA', 'BRI', 'Mandiri']),
            'nomor_rekening' => fake()->numerify('##########'),
            'nama_pemilik' => fake()->name(),
        ];
    }
}