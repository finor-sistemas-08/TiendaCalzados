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
            'nombre' => 'Manaco',
        ]);
        $marca = Marca::create([
            'nombre' => 'bata',
        ]);
        $marca = Marca::create([
            'nombre' => 'Nike',
        ]);   

        $marca = Marca::create([
            'nombre' => 'Adidas',
        ]);   
        
        $marca = Marca::create([
            'nombre' => 'Caterpillar',
        ]);   

        $marca = Marca::create([
            'nombre' => 'Azaleya',
        ]);   

        
    }
}
