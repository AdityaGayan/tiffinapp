<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Booking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('bookings', function(Blueprint $table){
            $table->increments('bookingid');
            $table->string('L');
            $table->string('D');
            $table->string('name');
            $table->string('address');
            $table->string('usermobile');
            $table->string('deliverymobile');
            $table->string('bookingoption');
            $table->date('starting_date');
            $table->date('last_date');
            $table->string('no_of_subscriptions');
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
         Schema::dropIfExists('bookings');
    }
}