<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'user_id' => 1, // Asegúrate de que este usuario existe
            'name' => 'Apartamento en el centro',
            'description' => 'Hermoso apartamento en el centro de la ciudad',
            'price' => 100,
            'period' => 'día',
            'category' => 'Propiedades',
            'image' => 'products/apartment.jpg',
        ]);

        Product::create([
            'user_id' => 1,
            'name' => 'Coche deportivo',
            'description' => 'Coche deportivo de lujo para ocasiones especiales',
            'price' => 50,
            'period' => 'hora',
            'category' => 'Vehículos',
            'image' => 'products/sports_car.jpg',
        ]);

        Product::create([
            'user_id' => 1,
            'name' => 'Equipo de sonido',
            'description' => 'Equipo de sonido profesional para eventos',
            'price' => 200,
            'period' => 'día',
            'category' => 'Electrónicos',
            'image' => 'products/sound_system.jpg',
        ]);
    }
}