<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;


class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = Categoria::create([
            'nombre' => 'BOTAS',
        ]);

        $categoria = Categoria::create([
            'nombre' => 'ZAPATILLAS',
        ]);

        $categoria = Categoria::create([
            'nombre' => 'MOCASINES',
        ]);

        $categoria = Categoria::create([
            'nombre' => 'ZAPATOS',
        ]);

        $categoria = Categoria::create([
            'nombre' => 'SANDALIAS',
        ]);


    }
}
