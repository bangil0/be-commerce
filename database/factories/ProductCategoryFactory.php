<?php

use Faker\Generator as Faker;
use App\Models\ProductsImage;

$factory->define(ProductsImage::class, function (Faker $faker) {
    return [
		'id_products' => $faker->numberBetween($min = 1, $max = 1000),
		'src' => $faker->imageUrl($width = 640, $height = 480),
	];
});
