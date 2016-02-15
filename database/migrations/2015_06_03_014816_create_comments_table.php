<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');
	    $table->unsignedInteger('event_id');
	    $table->foreign('event_id')
	          ->references('id')
	          ->on('events')
	          ->onDelete('cascade');

	    $table->unsignedInteger('member_id');
	    $table->foreign('member_id')
	          ->references('id')
	          ->on('members')
	          ->onDelete('cascade');

	    $table->text('contents');
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
		Schema::drop('comments');
	}

}
