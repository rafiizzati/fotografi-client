<?php

namespace Database\Factories;

use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailPesananFactory extends Factory
{
    public function definition(): array
    {
        return [
            'pesanan_id' => Pesanan::factory(),
            'produk_id' => Produk::factory(),
            'jumlah' => 1,
            'harga_satuan' => 500000,
            'subtotal' => 500000,
        ];
    }
}