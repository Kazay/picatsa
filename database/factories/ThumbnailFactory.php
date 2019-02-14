<?php

use Faker\Generator as Faker;

$factory->define(App\Thumbnail::class, function (Faker $faker) {
    return [
        'caption' => $faker->catchPhrase,
        'description' => $faker->paragraph(6,true),
        'url' => $faker->imageUrl(400, 400, 'cats', true, 'Faker', true),
    ];
});
