<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $name = $faker->sentence(rand(3, 8), true);
    $txt = $faker->realText(rand(1000, 4000));

    $createdAt = $faker->dateTimeBetween('-3 months', '-2 days');

    $data = [
        'user_id' => (rand(1, 5) == 5) ? 1 : 2,
        'image' => 'images/' . rand(1, 6) . '-product-sm.png',
        'name' => $name,
        'excerpt' => $faker->text(rand(40, 100)),
        'content_raw' => $txt,
        'content_html' => $txt,
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];

    return $data;
});
