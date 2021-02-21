<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Room_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('room_id');
            $table->string('locale');
            $table->string('price_per');
            $table->string('RoomView');
            $table->unique(['room_id' , 'locale']);
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
        Schema::dropIfExists('Room_translations');
    }
}
