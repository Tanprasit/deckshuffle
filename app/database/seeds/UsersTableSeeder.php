<?php

class UsersTableSeeder extends Seeder {
	public function run() {
		DB::table('users')->insert(array(
			array( 'username' => 'admin', 'password' => Hash::make('123'), 'email' => 'admin@hotmail.com', 'is_admin' => true ),
			array( 'username' => 'Luke', 'password' => Hash::make('luke'), 'email' => 'Luke@hotmail.com', 'is_admin' => false ),
			array( 'username' => 'Charn', 'password' => Hash::make('charn'), 'email' => 'Charn@hotmail.com', 'is_admin' => false ),
			array( 'username' => 'Nikki', 'password' => Hash::make('nikki'), 'email' => 'Nikki@hotmail.com', 'is_admin' => false ),
			)
		);
	}
}