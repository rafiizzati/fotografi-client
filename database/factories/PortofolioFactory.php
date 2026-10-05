<?php

namespace Database\Factories;

use App\Models\Mitra;
use Illuminate\Database\Eloquent\Factories\Factory;

class PortofolioFactory extends Factory
{
    public function definition(): array
    {
        return [
            'mitra_id' => Mitra::factory(),
            'judul' => fake()->sentence(3),
            'foto_url' => 'portofolio/'.fake()->word().'.jpg',
            'deskripsi' => fake()->sentence(),
        ];
    }
}
