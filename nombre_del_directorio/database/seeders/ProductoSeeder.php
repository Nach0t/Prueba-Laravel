<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        // Insertar productos de ejemplo
        Producto::create([
            'nombre' => 'Producto 1',
            'descripcion' => 'Descripción del Producto 1',
            'precio' => 1000.00,
        ]);

        Producto::create([
            'nombre' => 'Producto 2',
            'descripcion' => 'Descripción del Producto 2',
            'precio' => 2000.00,
        ]);

        Producto::create([
            'nombre' => 'Producto 3',
            'descripcion' => 'Descripción del Producto 3',
            'precio' => 3000.00,
        ]);
    }
}
