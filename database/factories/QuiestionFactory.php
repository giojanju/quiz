<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Question::class, function (Faker $faker) {
    return [
        'question' => $faker->realText(100),
        'right_answer' => rand(1, 2),
        'answers' => [
            [
                'key' => 1,
                'value' => 'Yes',
            ], [
                'key' => 2,
                'value' => 'No',
            ]
        ]
    ];
});
