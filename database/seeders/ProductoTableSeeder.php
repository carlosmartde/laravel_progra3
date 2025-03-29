<?php

namespace Database\Seeders;

use App\Models\Producto;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {

        Producto::factory()->count(1000)->create();
    }
}
