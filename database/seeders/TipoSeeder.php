<?php

namespace Database\Seeders;

use App\Models\TipoCalzado;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = TipoCalzado::create([
            'tipo' => 'Hombre',
        ]);
        $tipo = TipoCalzado::create([
            'tipo' => 'Mujer',
        ]);
        $tipo = TipoCalzado::create([
            'tipo' => 'Niños',
        ]);

    }
}
