<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Marca;


class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marca = Marca::create([
            'nombre' => 'NIKE',
        ]);
        $marca = Marca::create([
            'nombre' => 'MUSTANG',
        ]);
        $marca = Marca::create([
            'nombre' => 'CALVIN KLEIN',
        ]);   

        $marca = Marca::create([
            'nombre' => 'ADIDAS',
        ]);   
        
        $marca = Marca::create([
            'nombre' => 'VICTORIA',
        ]);   

        $marca = Marca::create([
            'nombre' => 'FILA',
        ]); 
        
        $marca = Marca::create([
            'nombre' => 'IPANEMA',
        ]); 

        $marca = Marca::create([
            'nombre' => 'MOU',
        ]); 

        
    }
}
