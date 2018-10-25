<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

use Almacen\Role_User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD




     DB::table('direcciones')->insert([
=======
     DB::table('almacen.direcciones')->insert([
>>>>>>> 2ed5a2164c291c491f66d046a8a5ff6604504d54
        'nombre' => 'TI',
        'estado' => 'Activo',
    ]);

     DB::table('users')->insert([
        'name' => 'SEZAC', 
        'nombreusuario' => 'SEZAC', 
        'email' => 'sezac@sezac.gob', 
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',//secret 
        'idDireccion' => '1', 
    ]);





     Role::create([
      'name' => 'Admin',
      'slug' => 'admin',
      'special' => 'all-access'
  ]);

        /*DB::table('role_user')->insert([
            'role_id' => '1', 
            'user_id' => '1', 
        ]);*/

        Role_User::create([
         'role_id' => '1', 
         'user_id' => '1', 
     ]);

    }
}
