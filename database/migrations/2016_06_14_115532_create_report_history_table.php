<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tank_id')->unsigned();
            $table->text('file_name');
            $table->text('uri');
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
        Schema::drop('report_history');
    }
}
