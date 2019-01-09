<?php


use Faker\Generator as Faker;

$factory->define(App\Foods::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'image' => $faker->imageUrl(200,200),
        'price' => $faker->randomFloat(1,0,50)."0"
    ];
});