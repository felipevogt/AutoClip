<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'correo' => $faker->unique()->safeEmail,
        'telefono' => $faker->unique()->randomNumber($nbDigits = 9,$strict = true)
    ];
});
