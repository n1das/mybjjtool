<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});




$factory->define(App\Profile::class, function (Faker\Generator $faker)
{

	$avatar = 'https://api.adorable.io/avatars/200/' .  rand(1,1000) .'@adorable.io.png';

	return [

	'weightcat_id' => rand(1,10),
	'belt_id' => rand(1,20),
	'age' => $faker->date('Y-m-d', $max='2000-1-1'),
	'moreinfo' => $faker->paragraph,
	'avatar' => $avatar,

	];
});




$factory->define(App\Belt::class, function (Faker\Generator $faker)
{
	$colores = ['Blanco', 'Azul', 'Morado', 'Marron', 'Negro'];
	$grados = ['', 'Primer', 'Segundo', 'Tercer', 'Cuarto'];

	return [
	'grados' => $grado =  rand(0,4),
	'color' => $color,
	'nombre' => $color = $colores[rand(0,4)] . $grados[$grado],
	];

});
