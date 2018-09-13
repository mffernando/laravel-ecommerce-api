<?php

use Faker\Generator as Faker;
Use App\Model\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //faker library
        'name' => $faker->word,
        'detail' => $faker->paragraph,
        'price' => $faker->numberBetween(100, 1000),
        'stock' => $faker->randomDigit,
        'discount' => $faker->numberBetween(2, 30),
        'user_id' => function(){
          return App\Model\User::all()->random();
        },
    ];
});
