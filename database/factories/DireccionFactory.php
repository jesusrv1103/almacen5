<?php

use Faker\Generator as Faker;

$factory->define(Almacen\Direccion::class, function (Faker $faker) {
	return [
	'nombre' => str_random(10),
	'estado' => 'Activo',
	];
});



