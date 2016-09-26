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
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Spot::class, function (Faker\Generator $faker) {
    return [
      'slug' => $faker->unique()->slug,
      'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'description' => $faker->sentence($nbWords = 20, $variableNbWords = true),
      'address' => $faker->streetAddress,
      'locality' => $faker->city,
      'reagion' => $faker->state,
      'postcode' => $faker->postcode,
      'country' => $faker->countryCode,
      'lat' => $faker->latitude,
      'lng' => $faker->longitude,
      'votes' => $faker->numberBetween($min = 1, $max = 10000),
      'hearts' => $faker->numberBetween($min = 1, $max = 1000),
      'rating' => $faker->numberBetween($min = 1, $max = 5),
      'creator_id' => $faker->numberBetween($min = 1, $max = 100),
      'updater_id' => $faker->numberBetween($min = 1, $max = 100),
    ];
});
