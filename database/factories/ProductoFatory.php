<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductoFatory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Producto::class;
    public function definition(): array
    {
        return [
            'nombre_producto'          => $this->faker->domainName(),
            'descripcion_producto'     => $this->faker->text(50),
            'precio_producto'          => $this->faker->randomFloat(2,0,1000),
            'precio_venta_producto'    => $this->faker->randomFloat(2,0,1000),
            'fecha_vencimiento_producto' => $this->faker->date(),
            'created_at'               => now(),
            'updated_at'               => now(),
        ];
    }
}
