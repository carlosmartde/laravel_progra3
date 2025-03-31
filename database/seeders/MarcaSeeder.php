<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    public function run()
    {
        $marcas = [
            'Volvo', 'Mercedes-Benz', 'Scania', 'MAN', 'DAF', 
            'Iveco', 'Kenworth', 'Freightliner', 'Peterbilt', 'Mack'
        ];
        
        foreach ($marcas as $marca) {
            Marca::create([
                'descripcion' => $marca
            ]);
        }
    }
}