<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use \App\Models\Category;

$factory->define(\App\Models\Post::class, function (Faker $faker) {
    $content = '';

    for($i = 0; $i < rand(3, 12); $i++){
        $content .= '<p>'.$faker->realText(rand(100, 500)).'</p>';
    }

    $category = Category::inRandomOrder()->first();

    return [
        'name' => $faker->word(),
        'content' => $content,
        'category_id' => $category->id,
    ];
});
