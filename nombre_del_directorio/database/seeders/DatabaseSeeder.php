<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Ejecuta los seeders.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProductoSeeder::class,  // Llama al ProductoSeeder
        ]);
    }
}
