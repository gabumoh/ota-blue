<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {       
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('property_id');
            $table->unsignedInteger('room_category_id');
            $table->unsignedInteger('channel_id');
            $table->unsignedInteger('reservation_payment_id');
            $table->unsignedInteger('guest_id');
            $table->unsignedInteger('stay_id');
            $table->unsignedInteger('number_of_rooms');
            $table->unsignedInteger('number_of_guests');                      
            $table->dateTime('check_in')->useCurrent();
            $table->dateTime('check_out')->nullable();
            $table->string('paid_status')->default('Not Paid');
            $table->string('booking_status')->default('Pending');
            $table->boolean('retrieved')->default(0);
            $table->string('ref_code', 100)->unique();
            $table->string('made_by');
            $table->text('comments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}