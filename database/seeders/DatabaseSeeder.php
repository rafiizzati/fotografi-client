<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            KatalogSeeder::class,   // Rafi
            TransaksiSeeder::class, // Teman (butuh data dari KatalogSeeder)
        ]);
    }
}
