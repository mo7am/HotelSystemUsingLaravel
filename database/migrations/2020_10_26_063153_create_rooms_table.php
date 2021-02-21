<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
           /* $table->integer('roomtype_id')->unsigned();
            $table->integer('TypeOfRoomTypeID')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->integer('state_clean_id')->unsigned();*/

            $table->integer('roomtype_id');
            $table->integer('state_id');
            $table->integer('state_clean_id');
            $table->integer('price');
            $table->integer('MaximumPerson');
            $table->integer('RoomSize');
            $table->integer('BedNumber');
            $table->boolean('is_active');
             $table->string('image')->default('img-1.jpg'); 
            $table->timestamps();
        });

         /*Schema::table('rooms', function($table) {
         $table->foreign('roomtype_id')->references('Id')->on('roomtypes');
         $table->foreign('TypeOfRoomTypeID')->references('Id')->on('typeofroomtypes');
         $table->foreign('state_id')->references('Id')->on('states');
         $table->foreign('state_clean_id')->references('Id')->on('states');

   });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
