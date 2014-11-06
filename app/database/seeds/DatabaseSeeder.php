<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('CardsTableSeeder');
		$this->call('SeriesTableSeeder');
		$this->call('PostsTableSeeder');
		$this->call('CommentsTableSeeder');
		$this->call('NewsTableSeeder');
	}

}
