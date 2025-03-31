<?php

namespace Database\Factories;

use App\Models\Marca;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarcaFactory extends Factory
{
    protected $model = Marca::class;

    public function definition()
    {
        $marcasCamiones = ['Volvo', 'Mercedes-Benz', 'Scania', 'MAN', 'DAF', 'Iveco', 'Kenworth', 'Freightliner', 'Peterbilt', 'Mack'];
        
        return [
            'descripcion' => $this->faker->randomElement($marcasCamiones),
        ];
    }
}