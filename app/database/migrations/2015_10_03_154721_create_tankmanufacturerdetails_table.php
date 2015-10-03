<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTankmanufacturerdetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tank_manufacturer_details', function(Blueprint $table)
		{
            $table->integer('tank_id');
            $table->string('company');
            $table->float('design_total_capacity');
            $table->string('serial_no');
            $table->date('dated');
            $table->float('test_pressure');
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
		Schema::drop('tank_manufacturer_details');
	}

}
