<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});

$factory->define(App\Reservation::class, function (Faker\Generator $faker) {
        $rand_str = ['Not paid', 'Piad'];
        $index = rand(0,1);
        $rand_int = [0,1];
    return [
        'property_id' => $faker->randomDigit(),
        'room_id' => $faker->randomDigit(),
        'payment_id' => $faker->randomDigit(),
        'check_in' => $faker->dateTime(),
        'check_out'=> $faker->dateTime(),
        'is_paid' => $rand_int[$index],
        'status' => $rand_str[$index],
        'comments' => $faker->realtext(),
        'created_at'=> $faker->dateTime(),

    ];
});

$factory->define(App\Invoice::class, function (Faker\Generator $faker) {
    $rand_str = ['Not paid', 'Piad'];
    $index = rand(0,1);
    $rand_int = [0,1];

    return [
        'guest_id' => $faker->randomDigit() == 0 ? 4 : $faker->randomDigit(),
        'ota_id' => $faker->randomDigit() == 0 ? 4 : $faker->randomDigit(),
        'date' => $faker->dateTime(),
        'invoice_ref'=> uniqid(rand(0,4)),
        'commission' => $faker->randomFloat(10,2),
        'status' => $rand_str[$index],
        'total' =>  $faker->randomFloat(10,2),
        'created_at'=> $faker->dateTime(),
    ];
});