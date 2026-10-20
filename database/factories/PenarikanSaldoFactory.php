<?php

namespace Database\Factories;

use App\Models\Mitra;
use App\Models\Rekening;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenarikanSaldoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'mitra_id' => Mitra::factory(),
            'rekening_id' => Rekening::factory(),
            'jumlah' => 100000,
            'status' => 'pending',
            'tanggal_penarikan' => now(),
        ];
    }
}