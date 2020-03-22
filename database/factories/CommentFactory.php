<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use App\Models\Post;

$factory->define(\App\Models\Comment::class, function (Faker $faker) {

    $post = Post::inRandomOrder()->first();

    return [
        'author' => $faker->firstName.' '.$faker->lastName,
        'content' => $faker->realText(),
        'model_id' => $post->id,
        'model_type' => Post::class,
    ];
});
