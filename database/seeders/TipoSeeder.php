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
            'tipo' => 'HOMBRE',
        ]);
        $tipo = TipoCalzado::create([
            'tipo' => 'MUJER',
        ]);
        $tipo = TipoCalzado::create([
            'tipo' => 'NIÑOS',
        ]);

    }
}
