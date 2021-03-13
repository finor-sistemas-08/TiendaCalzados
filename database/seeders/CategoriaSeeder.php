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
            'nombre' => 'botas con taco',
        ]);
        $categoria = Categoria::create([
            'nombre' => 'botas de agua',
        ]);
        $categoria = Categoria::create([
            'nombre' => 'zapatillas casuales',
        ]);
    }
}
