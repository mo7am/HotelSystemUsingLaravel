<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->float('balance')->nullable();
           // $table->integer('type_id')->unsigned();
           $table->integer('type_id')->default('6');
           $table->integer('stateBlock')->default('8');
            $table->string('image')->default('img-1.jpg'); 
            $table->rememberToken();
            $table->timestamps();
        });


        /* Schema::table('users', function($table) {
       $table->foreign('type_id')->references('Id')->on('usertypes');
   });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
