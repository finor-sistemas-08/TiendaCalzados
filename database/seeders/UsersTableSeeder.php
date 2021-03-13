<?php

namespace Database\Seeders;

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

        // usuario con el rol moderador
        
        
        
        
        $cliente = User::create([
            'name' => 'cliente',
            'email' => 'cliente@gmail.com',
            'password' => Hash::make('12345678')
          ]);
  
          $cliente->assignRole('cliente');
  
          
          
          // usuario con el rol super-admin
          $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678')
          ]);
  
          $admin->assignRole('admin');
    }
}
