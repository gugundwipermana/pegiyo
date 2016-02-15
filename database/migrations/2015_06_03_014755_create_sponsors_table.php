<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sponsors', function(Blueprint $table)
		{
			$table->increments('id');
	    $table->unsignedInteger('event_id');
	    $table->foreign('event_id')
	          ->references('id')
	          ->on('events')
	          ->onDelete('cascade');

	    $table->string('image_name', 100);
	    $table->string('sponsor_name', 30);
	    $table->string('type', 1)->default('1');
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
		Schema::drop('sponsors');
	}

}
