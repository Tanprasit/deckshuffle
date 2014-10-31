<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('posts', function($table) {
			$table->increments('id');
			$table->integer('card_id');
			$table->decimal('card_price', 11, 2);
			$table->integer('quantity');
			$table->boolean('free_postage');
			$table->decimal('postage_cost', 11, 2);
			$table->string('item_condition');
			$table->string('item_location');
			$table->string('post_to');
			$table->string('dispatch_time');
			$table->boolean('returns');
			$table->integer('buyer_id')->nullable();
			$table->integer('user_id')->reference('id')->on('users');
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
		Schema::drop('posts');
	}

}
