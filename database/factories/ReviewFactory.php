<?php

use Faker\Generator as Faker;
use App\Model\Product;
use App\Model\Review;

$factory->define(Review::class, function (Faker $faker) {
    return [
        //random product id
        'product_id' => function(){
          return Product::all()->random();
        },
        //faker library
        'customer' => $faker->name,
        'review' => $faker->paragraph,
        'star' => $faker->numberBetween(0, 5),
    ];
});
