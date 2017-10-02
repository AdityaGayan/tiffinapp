<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tiffin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiffin', function(Blueprint $table){
            $table->increments('tiffinid');
            $table->string('L');
            $table->string('D');
            $table->integer('bookingid');
            $table->integer('customerid');
            $table->string('bookingoption');
            $table->integer('quantity');
            $table->date('date');
            $table->string('status');
            $table->string('typemeal');
            $table->integer('charges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiffin');
    }
}
