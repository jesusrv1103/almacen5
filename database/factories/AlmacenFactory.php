<?php

use Faker\Generator as Faker;

$factory->define(Almacen\Almacen::class, function (Faker $faker) {
	return [

	'nombre' => $faker->sentence,
	'estado' => 'Activo',


	];
});

