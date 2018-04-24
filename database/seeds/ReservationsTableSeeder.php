<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Reservation::class, 20)->create();

    }
}
