<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('address');
			$table->string('contact', 20);
			$table->string('email')->unique();
			$table->text('info');
			$table->string('chat');
			$table->integer('paging');
			$table->integer('slide_front');
			$table->integer('slide_inside');
			$table->string('facebook');
			$table->string('twitter');
			$table->string('google');
			$table->string('rss');
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
		Schema::drop('settings');
	}

}
