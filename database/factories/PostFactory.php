<?php

use App\Category;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->paragraph(1);
    $userID = User::pluck('id')->random();
    $categoryID = Category::pluck('id')->random();

    return [
        'slug' => str_slug($title),
        'title' => $title,
        'excerpt' => $faker->paragraph(2),
        'image' => 'images/image-' . $faker->numberBetween(1, 6) . '.jpg',
        'reading_time' => $faker->numberBetween(1, 12),
        'content' => $faker->paragraph(20),
        'author' => $userID,
        'category' => $categoryID,
        'published_at' => $faker->dateTimeBetween('-2 months', 'now')
    ];
});
