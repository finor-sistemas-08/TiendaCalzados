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
        // BOTAS
        $categoria = Categoria::create([
            'nombre' => 'botas Camperas',
        ]);

        $categoria = Categoria::create([
            'nombre' => 'botas de Agua',
        ]);

        $categoria = Categoria::create([
            'nombre' => 'botas Planas',
        ]);

        $categoria = Categoria::create([
            'nombre' => 'botas con Tacon',
        ]);

        // BOTINES
        $categoria = Categoria::create([
            'nombre' => 'Botines con Tacon',
        ]);
        $categoria = Categoria::create([
            'nombre' => 'Botines con Plataforma',
        ]);
        $categoria = Categoria::create([
            'nombre' => 'Botines Planos',
        ]);

        $categoria = Categoria::create([
            'nombre' => 'Botines Industriales',
        ]);

        // ZAPATILLAS

        $categoria = Categoria::create([
            'nombre' => 'zapatillas Casuales',
        ]);

        $categoria = Categoria::create([
            'nombre' => 'Zapatillas Urbanas',
        ]);

        $categoria = Categoria::create([
            'nombre' => 'zapatillas de Vestir',
        ]);

        $categoria = Categoria::create([
            'nombre' => 'zapatillas Deportivas',
        ]);


        // ZAPATOS
        
        $categoria = Categoria::create([
            'nombre' => 'Mocasines',
        ]);

        $categoria = Categoria::create([
            'nombre' => 'Zapatos con Tacon',
        ]);
       
        $categoria = Categoria::create([
            'nombre' => 'Zapatos con Plataforma',
        ]);
        
        $categoria = Categoria::create([
            'nombre' => 'Zapatos de Salon',
        ]);
         
        $categoria = Categoria::create([
            'nombre' => 'Zapatos Planos',
        ]);

            // SANDAALIAS
         
        $categoria = Categoria::create([
            'nombre' => 'Sandalias con Plataforma',
        ]);

        $categoria = Categoria::create([
            'nombre' => 'Sandalias Planas',
        ]);
        $categoria = Categoria::create([
            'nombre' => 'Sandalias de Fiestas',
        ]);
        $categoria = Categoria::create([
            'nombre' => 'Sandalias con Tacon',
        ]);


    }
}
