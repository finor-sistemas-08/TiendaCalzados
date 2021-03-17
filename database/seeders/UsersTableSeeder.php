<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Repartidor;
use App\Models\Proveedor;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // usuario con el rol repartidor
        $repartidor = User::create([
            'name' => 'repartidor',
            'email' => 'repartidor@gmail.com',
            'password' => Hash::make('12345678')
          ]);
  
          $repartidor->assignRole('repartidor');
          //usuario con el rol de proveedor

          $proveedor = User::create([
            'name' => 'proveedor',
            'email' => 'proveedor@gmail.com',
            'password' => Hash::make('12345678')
          ]);

          $provee = Proveedor::create([
            'id' => $proveedor->id,
            'nombre' => 'Alejandro',
            'correo' =>'proveedor@gmail.com',
            'apellidos' =>'Chavez Perez',
            'telefono' =>'6321458',
            'direccion' =>'b/Villa Virginia',
          ]);
        // usuario con el rol cliente
          $cliente = User::create([
              'name' => 'cliente',
              'email' => 'cliente@gmail.com',
              'password' => Hash::make('12345678')
          ]);
  
          $cliente->assignRole('cliente');

          $client = Cliente::create([
            'id' => $cliente->id,
            'nombre' => 'Bernardo',
            'apellidos' =>'Perez Paz',
            'telefono' =>'7896541',
            'correo' =>'cliente@gmail.com'
          ]);
          
          // usuario con el rol super-admin
          $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678')
          ]);
  
          $admin->assignRole('admin');
    }
}
