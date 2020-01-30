<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Question, Quiz};
use Faker\Generator as Faker;

$factory->define(Quiz::class, function (Faker $faker) {
    $data = [
        'name' => $faker->name,
        'question_size' => rand(8, 12),
    ];

    return $data;
});
