<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Category::class, function (Faker $faker) {

    $content = '';

    for($i = 0; $i < rand(3, 10); $i++){
        $content .= '<p>'.$faker->realText(rand(100, 400)).'</p>';
    }

    return [
        'name' => $faker->jobTitle,
        'description' => $content
    ];
});
