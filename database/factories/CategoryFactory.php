<?php

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => title_case($faker->word) . ' ' . $faker->word
    ];
});
