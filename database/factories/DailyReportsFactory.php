<?php

use Faker\Generator as Faker;

$factory->define(App\Models\DailyReport::class, function (Faker $faker) {
    return [
        'user_id' => 4,
        'title' => $faker->realText(30),
        'content' => $faker->sentence(10),
        'reporting_time' => $faker->dateTime(),
    ];
});