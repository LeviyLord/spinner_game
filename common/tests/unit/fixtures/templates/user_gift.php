<?php
return [
	'user_id' => 1,
	'gift_id' => $faker->numberBetween(1, 20),
	'status' => 0,
	'create_at' => $faker->dateTime()->format(DATE_ISO8601)
];