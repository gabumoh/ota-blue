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
        'I would be bringing my family to spend summer break in your hotels, kindly assure me that I\'d have the best experience from your services',
         'Do you offer laundry services? Also is there good network coverge within the area. Thank you',
         'The last time I visted your hotels, I was short-changed, I hope the experience would not be the same',
         'I would want to know if you guys have chilled Heineken enough in you bar, I need this badly. Thank you',
         'I hope your services are still as awesome as it were the last time I used your hotel for an event?',
         'It was not specified whether restaurant services is offered in your hotel, please do clarify me on this matter. Thank you',
    ];
    $made_by = ['Adekunle Ajayi',  'Ugwu Chigozie','Idris Garba', 'EzeOkafor Margaret',
                'Ufok Bassey', 'Bassey Edet', 'Haruna Adamu', 'ALH. Danjuma Mato', 'Effiong Marcel',
                'Udoye Marthin', 'Ude Ngozichukwu', 
    ];
return [
    'property_id' => 1,
    'room_category_id' => rand(1,3),
    'guest_id' => rand(1,4),
    'stay_id' => $faker->numberBetween(1, 20),
    'channel_id' => rand(1,3),
    'reservation_payment_id' => $faker->numberBetween(1, 20),    
    'check_in' => $faker->dateTimeInInterval($startDate = 'now', $interval = '+ 5 days', $timezone = 'Africa/Lagos'),
    'check_out'=> $faker->dateTimeInInterval($startDate = '+ 5 days', $interval = '+ 5 days', $timezone = 'Africa/Lagos'),
    'number_of_guests' =>$faker->numberBetween(1, 10),
    'number_of_rooms' => $faker->numberBetween(1, 10),
    'made_by' =>$made_by[rand(0,10)],
    'paid_status' => $rand_str[$index],
    'booking_status' => 'pending',
    'booking_id' => substr(md5(uniqid(rand(0, 4))), 0,6),
    'comments' => $comments[$comment],
    'created_at'=> $faker->dateTimeInInterval($startDate = 'now', $interval = '+ 5 days', $timezone = 'Africa/Lagos'),

];
});

$factory->define(App\Invoice::class, function (Faker\Generator $faker) {
    $rand_str = ['Not paid', 'Paid'];
    $index = rand(0,1);
    $rand_int = [0,1];
    $commission = [300, 400, 400, 500, 600, 350, 450,1000, 1200, 250, 200, 700, 800, 900];
    $com_index = rand(0, 13);
    $total = [5000, 6000, 10000, 200000, 12000, 15000, 14000, 13000, 50000, 30000, 7000, 8000];
    $t_index = rand(0, 11);
    return [
        'guest_id' => rand(1,4),
        'channel_id' => rand(1,2),
        'property_id' => 1,
        'invoice_payment_id' => $faker->numberBetween(1, 20),        
        'commission' => $commission[$com_index],
        'status' => $rand_str[$index],
        'total' =>  $total[$t_index],
        'created_at'=> $faker->dateTimeInInterval($startDate = 'now', $interval = '+ 5 days', $timezone = 'Africa/Lagos'),
        'updated_at'=> $faker->dateTimeInInterval($startDate = 'now', $interval = '+ 5 days', $timezone = 'Africa/Lagos'),
    ];
});