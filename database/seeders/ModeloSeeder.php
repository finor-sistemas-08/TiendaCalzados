<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Modelo;


class ModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modelo = Modelo::create([
            'nombre' => 'GH-54789',
        ]);
        
        $modelo = Modelo::create([
            'nombre' => 'NK-96874',
        ]);

        $modelo = Modelo::create([
            'nombre' => 'JK-97415',
        ]);

        $modelo = Modelo::create([
            'nombre' => 'GT-14563',
        ]);
    }
}
