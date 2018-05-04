<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('channel_id');
            $table->unsignedInteger('guest_id');
            $table->unsignedInteger('property_id');
            $table->unsignedInteger('invoice_payment_id');
            $table->unsignedInteger('commission');
            $table->unsignedInteger('total');
            $table->boolean('retrieved')->default(0);
            $table->enum('status', ['Paid', 'Not paid']);
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
        Schema::dropIfExists('invoices');
    }
}
