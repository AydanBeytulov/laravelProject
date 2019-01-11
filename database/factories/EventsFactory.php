<?php


use Faker\Generator as Faker;

$factory->define(App\Events::class, function (Faker $faker) {

    $return = [
        'name' => $faker->name,
        'image' => $faker->imageUrl(640,480),
        'end' => $faker->dateTime("now"),
        'price' => $faker->randomFloat(1,0,50)."0"
    ];

    $return['start'] = $faker->dateTime($return['end']);

    return $return ;
});
