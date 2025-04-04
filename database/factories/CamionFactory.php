<?php

namespace Database\Factories;

use App\Models\Camion;
use App\Models\Marca;
use App\Models\Transporte;
use Illuminate\Database\Eloquent\Factories\Factory;

class CamionFactory extends Factory
{
    protected $model = Camion::class;

    public function definition()
    {
        $colores = ['Rojo', 'Azul', 'Blanco', 'Negro', 'Gris', 'Verde', 'Amarillo'];
        
        return [
            'placa' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'codig_interno' => $this->faker->unique()->regexify('[A-Z]{2}[0-9]{4}'),
            'id_transporte' => function() {
                return Transporte::inRandomOrder()->first()->id_transporte ?? 1;
            },
            'color' => $this->faker->randomElement($colores),
            'modelo' => $this->faker->date('Y-m-d', '-5 years'),
            'capacidad_toneladas' => $this->faker->numberBetween(5, 40),
            'created_at' => now(),
            'updated_at' => now(),
            'id_marca' => function() {
                return Marca::inRandomOrder()->first()->id_marca ?? 1;
            },
        ];
    }
}