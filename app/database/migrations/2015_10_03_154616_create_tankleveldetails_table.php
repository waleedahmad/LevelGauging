<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTankleveldetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tank_level_details', function(Blueprint $table)
		{
			$table->integer('tank_id');
			$table->string('marking_id');
			$table->integer('max_sfl');
			$table->float('current_fuel');
			$table->float('tank_ullage');
			$table->float('fuel_mass');
			$table->float('corrected_density');
			$table->timestamp('sample_taken');
			$table->float('sample_density');
			$table->float('sample_temp');
			$table->integer('empty_point');
			$table->integer('reorder_point');
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
		Schema::drop('tank_level_details');
	}

}
