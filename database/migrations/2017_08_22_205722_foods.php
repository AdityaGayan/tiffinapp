<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Foods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function(Blueprint $table){
            $table->increments('foodid');
            $table->string('name');
            $table->string('description');
            $table->string('LD');
            $table->string('starters');
            $table->string('thali');
            $table->string('chappati');
            $table->string('vegetable');
            $table->string('salad&pickle');
            $table->string('desert');
            $table->string('complementary');
            $table->integer('dailyprice');
            $table->integer('weeklyprice');
            $table->integer('monthlyprice');
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
        Schema::dropIfExists('foods');
    }
}
