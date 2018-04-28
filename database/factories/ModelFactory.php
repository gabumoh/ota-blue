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
    $rand_str = ['Not paid', 'Paid'];
    $index = rand(0,1);
    $comment = rand(0,5);
    $rand_int = [0,1];
    $comments = [
        'Please I would need constant power during my stay, the business for which I\'d be needing 
        this lodging is such that epileptic power would not be welcome. Should this condition will not
         be met I would love to know before effecting the booking. Thanks a bunch',
         'I will unfailing pay for this reservation, should I not pay as early as you may consider early, please do bear with me, I
         will surely pay for it. Thank you',
         'I am making this reservation with the assurance I was given that the poor facilities in your hotel has
         been re-innovated, if this is not true do let me know in advance. Thank you',
         'I would want to know if you guys have chilled Heineken enough in you bar, I need this badly. Thank you',
         'I hope your services are still as awesome as it were the last time I used your hotel for an event?',
         'It was not specified whether restaurant services is offered in your hotel, please do clarify me on this matter. Thank you',
    ];
return [
    'property_id' => $faker->numberBetween(1, 20),
    'room_category_id' => $faker->numberBetween(1, 20),
    'guest_id' => $faker->numberBetween(1, 20),
    'stay_id' => $faker->numberBetween(1, 20),
    'channel_id' => $faker->numberBetween(1, 20),
    'reservation_payment_id' => $faker->numberBetween(1, 20),
    'check_in' => $faker->dateTimeInInterval($startDate = 'now', $interval = '+ 5 days', $timezone = 'Africa/Lagos'),
    'check_out'=> $faker->dateTimeInInterval($startDate = '+ 5 days', $interval = '+ 5 days', $timezone = 'Africa/Lagos'),
    'number_of_guests' =>$faker->numberBetween(1, 10),
    'number_of_rooms' => $faker->numberBetween(1, 10),
    'made_by' =>$faker->name,
    'paid_status' => $rand_str[$index],
    'booking_status' => $rand_str[$index],
    'comments' => $comments[$comment],
    'created_at'=> $faker->dateTimeInInterval($startDate = 'now', $interval = '+ 5 days', $timezone = 'Africa/Lagos'),

];
});

$factory->define(App\Invoice::class, function (Faker\Generator $faker) {
    $rand_str = ['Not paid', 'Paid'];
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