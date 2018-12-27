<?php

use Faker\Generator as Faker;
use App\Models\Customer;

$factory->define(Customer::class, function (Faker $faker) {
    return [
		'name' => $faker->name(),
		'email' => $faker->email(),
		'gender' => $faker->randomElement($array = array ('Laki-laki','Perempuan')),
		'password' => '$2y$10$jKLQ9iujgg8XOljdCsF.CeGbmHDz2ga0PpN26SHrsw2b4QtCsfPPW',
		'nomor_hp' => $faker->phoneNumber(),
		'province_id' => $faker->numberBetween($min = 1, $max = 34),
		'cities_id' => $faker->numberBetween($min = 1, $max = 501),
		'kode_pos' => $faker->postcode(),
		'alamat' => $faker->address(),
	];
});