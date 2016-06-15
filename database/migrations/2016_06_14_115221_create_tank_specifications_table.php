<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTankSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tank_specifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tank_id')->unsigned();
            $table->string('fuel_grade');
            $table->string('marking_id');
            $table->string('shape');
            $table->string('titled');
            $table->string('internal');
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
        Schema::drop('tank_specifications');
    }
}
