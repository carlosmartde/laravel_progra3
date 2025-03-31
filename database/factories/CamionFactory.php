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
            'placa' => $this->faker->regexify('[A-Z]{3}[0-9]{3}'),
            'codig_interno' => $this->faker->regexify('[A-Z]{2}[0-9]{4}'),
            'id_transporte' => Transporte::factory(),
            'color' => $this->faker->randomElement($colores),
            'modelo' => $this->faker->date('Y-m-d', '-5 years'),
            'capacidad_toneladas' => $this->faker->numberBetween(5, 40) . ' T',
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'id_marca' => Marca::factory(),
        ];
    }
}