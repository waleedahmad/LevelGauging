<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tank_location', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tank_id')->unsigned();
            $table->string('location_name');
            $table->string('airport_code');
            $table->string('street1');
            $table->string('street2');
            $table->string('city');
            $table->string('region');
            $table->string('postcode');
            $table->string('country');
            $table->timestamps();

            $table->foreign('tank_id')->references('id')->on("tanks")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tank_location');
    }
}
