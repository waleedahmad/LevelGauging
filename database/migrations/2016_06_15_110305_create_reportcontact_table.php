<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportcontactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tank_id')->unsigned();
            $table->string('report_type');
            $table->string('email');
            $table->integer('active');
            $table->time('time');
            $table->date('date');
            $table->string('frequency');
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
        Schema::drop('report_contacts');
    }
}
