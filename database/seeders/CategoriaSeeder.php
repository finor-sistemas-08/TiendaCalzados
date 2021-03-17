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
            'nombre' => 'Botas',
        ]);

        $categoria = Categoria::create([
            'nombre' => 'Botines',
        ]);

        $categoria = Categoria::create([
            'nombre' => 'Zapatillas',
        ]);

        $categoria = Categoria::create([
            'nombre' => 'Zapatos',
        ]);

        $categoria = Categoria::create([
            'nombre' => 'Sandalias',
        ]);


    }
}
