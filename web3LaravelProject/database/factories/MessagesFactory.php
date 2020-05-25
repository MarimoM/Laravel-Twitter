<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\messages;
use Faker\Generator as Faker;

$factory->define(messages::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,22),
        'text' => $faker->sentence(10)
    ];
});
