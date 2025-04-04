<?php

namespace Database\Seeders;

use App\Models\Camion;
use Illuminate\Database\Seeder;

class CamionSeeder extends Seeder
{
    public function run()
    {
        // Simplificado para evitar problemas
        Camion::factory()->count(1000)->create(); // Reducido a 10 para testing
    }
}