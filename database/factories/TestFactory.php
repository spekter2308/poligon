<?php

use Faker\Generator as Faker;

$factory->define(App\Test::class, function (Faker $faker) {
	return [
		'name' => $faker->name,
		'email' => $faker->unique()->safeEmail,
	];
});

$factory->defineAs(App\Test::class, 'admin', function (Faker $faker) {
    return [
		'name' => 'admin',
		'email' => $faker->unique()->safeEmail,
    ];
});

$factory->defineAs(App\TestRoles::class, 'admin', function (Faker $faker) {
	return [
		'name' =>  'Адміністратор',
		'slug' => 'admin',
		'description' => 'Адміністратор з повними правами',
		'group' => 'адміністратори'
	];
});

$factory->defineAs(App\TestAdditional::class, 'admin', function (Faker $faker) {
	return [
		'lastname' => $faker->firstName,
		'firstname' => $faker->lastName
	];
});
