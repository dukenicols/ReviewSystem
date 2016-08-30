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
	$title = $faker->sentence($nbWords = 6, $variableNbWords = true);
	return [
			'title' => $title,
			'client' => $faker->company,
			'url' => $faker->domainName,
			'description' => $faker->text($maxNbChars = 200),
			'score' => rand( 1, 5 ),
			'approved' => rand(0, 1),
			'user_id' => 1,
			'review_url' => App\Repositories\ReviewRepository::titleToUrl($title)
			];
});

$factory->define(App\Comment::class, function(Faker\Generator $faker) {
  return [
    'review_id' => rand(1,50),
    'user_id' => rand(1,2),
    'text' => $faker->text(200),
  ];
});
