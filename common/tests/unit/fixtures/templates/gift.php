<?php
return [
	'name' => $faker->city,
	'description' => $faker->text,
	'store_id' => $faker->numberBetween(1, 19),
	'amount' => $faker->numberBetween(10, 50),
];