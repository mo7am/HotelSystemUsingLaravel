<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userrooms', function (Blueprint $table) {
            $table->id();
            /*$table->integer('room_id')->unsigned();
            $table->integer('user_id')->unsigned();*/
            $table->integer('room_id');
            $table->integer('user_id');
            $table->string('phone');
            $table->dateTime('checkindate');
            $table->dateTime('checkoutdate');
            $table->timestamps();
        });

        /* Schema::table('userrooms', function($table) {
         $table->foreign('room_id')->references('Id')->on('rooms');
         $table->foreign('user_id')->references('Id')->on('users');
   });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userrooms');
    }
}
