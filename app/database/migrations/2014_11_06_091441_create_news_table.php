<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('news', function($table){
			$table->increments('id');
			$table->string('title');
			$table->text('text');
			$table->string('image_1');
			$table->string('image_2');
			$table->string('image_3');
			$table->string('image_4');
			$table->string('image_5');
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
		DB::drop('news');
	}

}
