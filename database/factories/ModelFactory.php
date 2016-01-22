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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Review::class, function(Faker\Generator $faker) {
	return [
			'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
			'client' => $faker->company,
			'url' => $faker->domainName,
			'description' => $faker->text($maxNbChars = 200),
			'score' => rand( 1, 5 ),
			'created_by' => 1,
			];
});
