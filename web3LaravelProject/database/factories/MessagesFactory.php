<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\messages;
use Faker\Generator as Faker;

$factory->define(messages::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'text' => $faker->sentence(3)
    ];
});
