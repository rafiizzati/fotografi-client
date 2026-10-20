<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MitraFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->mitra(),
            'nama_mitra' => fake()->company(),
            'deskripsi' => fake()->sentence(),
            'alamat' => fake()->address(),
            'jam_operasional' => '08:00 - 20:00',
        ];
    }
}