<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'client_firstname' => $faker->firstName,
        'client_lastname' => $faker->lastName,
        'client_phone' => $faker->phoneNumber,
        'delivery_at' => $faker->dateTimeBetween('now', '+4 weeks', 'Europe/Paris'),
        'user_id' => 1
    ];
});

// TODO: Factory state : https://laravel.com/docs/5.8/database-testing#factory-states
