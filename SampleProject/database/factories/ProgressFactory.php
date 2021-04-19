<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Progress;
use Faker\Generator as Faker;

$factory->define(Progress::class, function (Faker $faker) {
    return [
        'created_at' => $faker->date('Y-m-d H:i:s', 'now'),
        'updated_at' => $faker->date('Y-m-d H:i:s', 'now'),
        'name' => $faker->name,
        'comment' => $faker->realText(200),
    ];
});
