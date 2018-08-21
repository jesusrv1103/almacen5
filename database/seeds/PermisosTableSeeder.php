<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Permission::create([
    		'name'  =>  'Navegar  Usuarios',
    		'slug' => 'users.index',
    		'description' => 'Lista y navega todos los usuario de el sistema',

    		]);

    	Permission::create([
    		'name'  =>  'Crear Usuarios',
    		'slug' => 'users.create',
    		'description' => 'Lista y navega todos los almacenes de el sistema',

    		]);
    	Permission::create([
    		'name'  =>  'Editar Usuarios',
    		'slug' => 'users.edit',
    		'description' => 'Edita cualquier usuario de el sistema',

    		]);
    	Permission::create([
    		'name'  =>  'Navegar Articulos',
    		'slug' => 'users.destroy',
    		'description' => 'Eliminar los usuarios de el sistema',

    		]);


    	Permission::create([
    		'name'  =>  'Navegar  Roles',
    		'slug' => 'roles.index',
    		'description' => 'Lista y navega todos los usuario de el sistema',

    		]);

    	Permission::create([
    		'name'  =>  'Crear Roles',
    		'slug' => 'roles.create',
    		'description' => 'Lista y navega todos los almacenes de el sistema',

    		]);
    	Permission::create([
    		'name'  =>  'Editar Roles',
    		'slug' => 'roles.edit',
    		'description' => 'Edita cualquier usuario de el sistema',

    		]);
    	Permission::create([
    		'name'  =>  'ELiminar Roles',
    		'slug' => 'roles.destroy',
    		'description' => 'Eliminar los Roles de el sistema',

    		]);

    		Permission::create([
    		'name'  =>  'Navegar  Almacenes',
    		'slug' => 'almacenes.index',
    		'description' => 'Lista y navega todos los Almacenes de el sistema',

    		]);

    	Permission::create([
    		'name'  =>  'Crear Almacenes',
    		'slug' => 'almacenes.create',
    		'description' => 'Lista y navega todos los almacenes de el sistema',

    		]);
    	Permission::create([
    		'name'  =>  'Editar Almacenes',
    		'slug' => 'almacenes.edit',
    		'description' => 'Edita cualquier almacen de el sistema',

    		]);
    	Permission::create([
    		'name'  =>  'ELiminar Roles',
    		'slug' => 'almacenes.destroy',
    		'description' => 'Eliminar los almacenes de el sistema',

    		]);
    }
}
