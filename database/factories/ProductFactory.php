<?php

use Faker\Generator as Faker;
use App\Models\Products;

$factory->define(Products::class, function (Faker $faker) {
    return [
		'sku' => $faker->ean8(),
		'name' => $faker->firstNameMale(),
		'id_products_category' => $faker->randomElement(['1' ,'2', '3']),
		'slug' => $faker->firstNameMale(),
		'description' => $faker->sentence(),
		'cover' => $faker->imageUrl($width = 640, $height = 480),
		'qty' => $faker->randomDigit(),
		'cost' => $faker->numberBetween($min = 100000, $max = 1000000),
		'price' => $faker->numberBetween($min = 100000, $max = 1000000),
		'status' => 'On',
		'unit' => 'pcs'
	];
});
