<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTankinspectionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tank_inspection', function(Blueprint $table)
		{			
            $table->integer('tank_id');
            $table->date('date_inspected');
            $table->date('date_cleaned');
            $table->date('next_inspection');
            $table->string('contractor');
            $table->string('phone');
            $table->string('email');         
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
		Schema::drop('tank_inspection');
	}

}
