<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\LoginToken::class, function (Faker $faker) {
    return [
        'value'  => str_random(50)
    ];
});
