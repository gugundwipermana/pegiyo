<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cities', function(Blueprint $table)
		{
			$table->increments('id');

	    $table->unsignedInteger('province_id');
	    $table->foreign('province_id')
	          ->references('id')
	          ->on('provinces')
	          ->onDelete('cascade');

	    $table->string('city_name', 20);
	    $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cities');
	}

}
