<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlamatFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'label' => 'Rumah',
            'alamat_lengkap' => fake()->streetAddress(),
            'kota' => fake()->city(),
            'provinsi' => 'Jawa Timur',
            'kode_pos' => fake()->numerify('#####'),
        ];
    }
}