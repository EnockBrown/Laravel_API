<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'product_name'=>$faker->name,
        'amount'=>$faker->numberBetween($min = 1000, $max = 9000),
        'payment_id'=>$faker->swiftBicNumber,
        'customer_id'=>$faker->randomDigit,
        'quantity'=>$faker->randomDigit,
    ];
});
