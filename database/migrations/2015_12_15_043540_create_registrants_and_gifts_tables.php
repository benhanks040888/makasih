<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrantsAndGiftsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('email');
            $table->string('fb_id');
            $table->string('tw_id');
            $table->string('in_id');
            $table->timestamp('pickup_at');
            $table->timestamps();
        });

        Schema::create('gifts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('registrant_id')->index();
            $table->string('name');
            $table->string('path');
            $table->text('desciption');
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
        Schema::drop('registrants');
        Schema::drop('gifts');
    }
}
