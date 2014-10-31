<?php

class CommentsTableSeeder extends Seeder {
	public function run() {
		DB::table('comments')->insert(
			array(
				array('user_id'=>1,'card_id'=>1,'comment'=>'This card is so op','rating'=>5 ),
				array('user_id'=>2,'card_id'=>1,'comment'=>'This card is good','rating'=>4 ),
				array('user_id'=>3,'card_id'=>1,'comment'=>'This card is so bad','rating'=>2 ),
			)
		);
	}
}