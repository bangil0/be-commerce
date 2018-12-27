<?php

use Faker\Generator as Faker;
use App\Models\Order;

$factory->define(Order::class, function (Faker $faker) {
    return [
		'order_no' => $faker->ean8(),
		'order_date' => $faker->dateTimeThisYear($max = 'now', $timezone = 'Asia/Jakarta'),
		'kurir' => $faker->randomElement($array = array ('jne','tiki','pos')),
		'no_resi' => $faker->ean13(),
		'id_customers' => $faker->numberBetween($min = 1, $max = 100),
		'grand_total' => $faker->numberBetween($min = 100000, $max = 999999),
		'id_order_statuses' => $faker->numberBetween($min = 1, $max = 6),
		'payment' => 'Direct Bank Transfer'
	];
});

		
