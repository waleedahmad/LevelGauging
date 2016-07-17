<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTankManufacturerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tank_manufacturer_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tank_id')->unsigned();
            $table->string('company');
            $table->float('design_total_capacity');
            $table->string('serial_no');
            $table->date('dated');
            $table->float('test_pressure');
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
        Schema::drop('tank_manufacturer_details');
    }
}
