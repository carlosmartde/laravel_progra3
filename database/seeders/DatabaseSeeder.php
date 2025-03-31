<?php

namespace Database\Seeders;

use App\Models\Producto;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\ProductoFatory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // Ejecutar los seeders individuales
    $this->call([
        ProductoTableSeeder::class,
        TransporteSeeder::class,
        MarcaSeeder::class,
        CamionSeeder::class,
    ]);
    
    // Crear el usuario de prueba por separado
    User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
    ]);
}
}
