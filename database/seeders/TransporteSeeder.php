<?php

namespace Database\Seeders;

use App\Models\Transporte;
use Illuminate\Database\Seeder;

class TransporteSeeder extends Seeder
{
    public function run()
    {
        // Crear 10 transportes de ejemplo
        Transporte::factory()->count(10)->create();
    }
}