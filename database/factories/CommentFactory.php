<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use App\Models\Post;
use App\Models\Category;

$factory->define(\App\Models\Comment::class, function (Faker $faker) {

    $models = [Post::class, Category::class];

    $model = $models[rand(0, count($models) - 1)];

    $post = $model::inRandomOrder()->first();

    return [
        'author' => $faker->firstName.' '.$faker->lastName,
        'content' => $faker->realText(),
        'model_id' => $post->id,
        'model_type' => $model,
    ];
});
