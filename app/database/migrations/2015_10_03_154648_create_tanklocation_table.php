<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTanklocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tank_location', function(Blueprint $table)
		{
            $table->integer('tank_id');
            $table->string('location_name');
            $table->string('airport_code');
            $table->string('street1');
            $table->string('street2');
            $table->string('city');
            $table->string('region');
            $table->string('post_code');
            $table->string('country');
            $table->timestamps();
            $table->primary('tank_id');
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
