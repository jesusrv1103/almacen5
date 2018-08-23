<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Almacen\Direccion::class,20)->create();
    	factory(Almacen\User::class,20)->create();


    	Role::create([
    		'name' => 'Admin',
    		'slug' => 'admin',
    		'special' => 'all-access'
    		]);
    }
}
