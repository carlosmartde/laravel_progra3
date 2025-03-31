<?php

namespace Database\Factories;

use App\Models\Transporte;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransporteFactory extends Factory
{
    protected $model = Transporte::class;

    public function definition()
    {
        return [
            'codigo' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'nombre' => $this->faker->company(),
            'razon_social' => $this->faker->catchPhrase(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
        ];
    }
}