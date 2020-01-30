<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Applicant;
use App\Models\Quiz;
use Faker\Generator as Faker;

$factory->define(Applicant::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'quiz_id' => function () {
            return factory(Quiz::class)->create()->id;
        },
        'result' => [
            [
                'question' => 1,
                'answer' => 2,
            ]
        ]
    ];
});
