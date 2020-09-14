<?php
return [
	'amount' => $faker->numberBetween(10, 1000),
	'type' => $faker->numberBetween(0, 2),
	'update_at' => $faker->dateTime()->format(DATE_ISO8601),
];