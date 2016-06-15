<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTankInspectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tank_inspection', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tank_id')->unsigned();
            $table->date('date_inspected');
            $table->date('date_cleaned');
            $table->date('next_inspection');
            $table->string('contractor');
            $table->string('phone');
            $table->string('email');
            $table->timestamps();

            $table->foreign('tank_id')->references('id')->on("tanks");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tank_inspection');
    }
}
