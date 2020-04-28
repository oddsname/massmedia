<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\FileModel;
use App\Models\Post;

$factory->define(\App\Models\FileModel::class, function (Faker $faker) {

    $folder = 'files/factory';
    $files = scandir(public_path($folder));

    $file = $files[rand(2, count($files) - 1)];
    $array = explode('/', $file);
    $name = end($array);

    $post = Post::inRandomOrder()->first();

    return [
        'name' => $name,
        'path' => '/'.$folder.'/'.$file,
        'type' => FileModel::getTypeByName($name),
        'collection' => null,
        'model_type' => Post::class,
        'model_id' => $post->id,
    ];
});
