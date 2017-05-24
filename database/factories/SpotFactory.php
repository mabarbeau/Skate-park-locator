<?php
$factory->define(App\Spot::class, function (Faker\Generator $faker) {
    $map = "[";
    $random = mt_rand(2,9);
    for ($i=0; $i <= $random; $i++) {
      $lat = $faker->latitude;
      $lng = $faker->longitude;
      $map .= '[' . $lat . ', ' . $lng . ']';
      if ($i != $random) {
        $map .= ', ';
      }
    }
    $map .= "]";

    return [
      'slug' => $faker->unique()->slug($nbWords = 3),
      'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'description' => $faker->sentence($nbWords = 20, $variableNbWords = true),
      'address' => $faker->streetAddress,
      'locality' => $faker->city,
      'reagion' => $faker->state,
      'postcode' => $faker->postcode,
      'country' => $faker->countryCode,
      'map' => $map,
      'votes' => $faker->numberBetween($min = 1, $max = 10000),
      'hearts' => $faker->numberBetween($min = 1, $max = 1000),
      'rating' => $faker->numberBetween($min = 1, $max = 5),
      'creator_id' => function () {
        return factory(App\User::class)->create()->id;
      },
      'updater_id' => function () {
        return factory(App\User::class)->create()->id;
      },
    ];
});

$factory->define(App\Feature::class, function (Faker\Generator $faker) {
    return [
      'name' => $faker->unique()->slug,
      'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'lat' => $faker->latitude,
      'lng' => $faker->longitude,
      'spot_id' => function () {
          return factory(App\Spot::class)->create()->id;
      },
      'creator_id' => $faker->numberBetween($min = 1, $max = 100),
      'updater_id' => $faker->numberBetween($min = 1, $max = 100),
    ];
});
