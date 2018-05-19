<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Reservation;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $reservation = Reservation::all();
        $count_reservation = count( $reservation);
         
        $seed = 10 - $count_reservation;
        factory(App\Reservation::class, $seed)->create();

    }
}
