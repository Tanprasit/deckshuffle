<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('cards', function($table) {
			$table->increments('id');
			$table->integer('level');
			$table->integer('cost');
			$table->string('colour');
			$table->string('trigger');
			$table->integer('power');
			$table->integer('soul');
			$table->string('series_id');
			$table->string('traits');
			$table->string('name');
			$table->string('jap_name');
			$table->string('eng_text');
			$table->string('eng_text2');
			$table->string('jap_text');
			$table->string('jap_text2');
			$table->string('type');
			$table->string('unique_identifier');
			$table->integer('rating')->nullable();
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
		//
		Schema::drop('cards');
	}

}
