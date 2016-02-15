<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');

	    $table->unsignedInteger('user_id');
	    $table->foreign('user_id')
	          ->references('id')
	          ->on('users')
	          ->onDelete('cascade');

	    $table->string('title', 50);
	    $table->text('contents');

	    $table->timestamp('date_start');
	    $table->timestamp('date_end');

	    $table->string('location');

	    $table->unsignedInteger('city_id');
	    $table->foreign('city_id')
	          ->references('id')
	          ->on('cities')
	          ->onDelete('cascade');

	    $table->string('video', 100);
	    $table->string('banner', 100);

	    $table->string('type', 1)->default('1');
	    $table->string('status', 1)->default('1');

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
		Schema::drop('events');
	}

}
