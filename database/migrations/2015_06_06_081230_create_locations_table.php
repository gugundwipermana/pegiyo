<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locations', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('event_id');
	    $table->foreign('event_id')
	          ->references('id')
	          ->on('events')
	          ->onDelete('cascade');

			$table->string('name');
			$table->string('type', 1);
			$table->text('description')->nullable();
			$table->string('latitude', 30);
	    $table->string('longitude', 30);
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
		Schema::drop('locations');
	}

}
