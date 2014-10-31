<?php

class PostsTableSeeder extends Seeder {
	public function run() {
		DB::table('posts')->insert(array(
				array( 'card_id' => 1, 'card_price' => 100.99,'quantity' => 1, 'item_condition' => 'New', 'free_postage' => true, 'postage_cost' => 0, 'item_location' => 'United Kingdom', 'post_to' => 'European Union', 'dispatch_time' => '1 working day', 'returns' => true,'buyer_id' => 4, 'user_id' => 1),
				array( 'card_id' => 1, 'card_price' => 101.95,'quantity' => 2, 'item_condition' => 'Used', 'free_postage' => false,'postage_cost' => 5.00, 'item_location' => ' Germany', 'post_to' => 'Worldwide', 'dispatch_time' => '2 working day', 'returns' => false, 'buyer_id' => 3, 'user_id' => 2),
				array( 'card_id' => 2, 'card_price' => 102.96,'quantity' => 3, 'item_condition' => 'Used', 'free_postage' => false,'postage_cost' => 4.50, 'item_location' => 'France', 'post_to' => 'Worldwide', 'dispatch_time' => '2 working day', 'returns' => false, 'buyer_id' => 2, 'user_id' => 3),
				array( 'card_id' => 2, 'card_price' => 99.99,'quantity' => 4, 'item_condition' => 'New', 'free_postage' => true,'postage_cost' => 0, 'item_location' => 'United Kingdom', 'post_to' => 'European Union', 'dispatch_time' => '1 working day', 'returns' => true, 'buyer_id' => 1, 'user_id' => 4),
				array( 'card_id' => 3, 'card_price' => 5.99,'quantity' => 1, 'item_condition' => 'New', 'free_postage' => true,'postage_cost' => 0, 'item_location' => 'United Kingdom', 'post_to' => 'European Union', 'dispatch_time' => '3 working day', 'returns' => true, 'buyer_id' => 2, 'user_id' => 1),
				array( 'card_id' => 32, 'card_price' => 10.99,'quantity' => 1, 'item_condition' => 'New', 'free_postage' => true,'postage_cost' => 0, 'item_location' => 'United Kingdom', 'post_to' => 'European Union', 'dispatch_time' => '3 working day', 'returns' => true, 'buyer_id' => 2, 'user_id' => 1),
				array( 'card_id' => 20, 'card_price' => 12.99,'quantity' => 1, 'item_condition' => 'New', 'free_postage' => true,'postage_cost' => 0, 'item_location' => 'United Kingdom', 'post_to' => 'European Union', 'dispatch_time' => '2 working day', 'returns' => true, 'buyer_id' => 2, 'user_id' => 1),
				array( 'card_id' => 34, 'card_price' => 12.99,'quantity' => 1, 'item_condition' => 'New', 'free_postage' => true,'postage_cost' => 0, 'item_location' => 'United Kingdom', 'post_to' => 'European Union', 'dispatch_time' => '2 working day', 'returns' => true, 'buyer_id' => 2, 'user_id' => 1),
				array( 'card_id' => 21, 'card_price' => 12.99,'quantity' => 1, 'item_condition' => 'New', 'free_postage' => true,'postage_cost' => 0, 'item_location' => 'United Kingdom', 'post_to' => 'European Union', 'dispatch_time' => '2 working day', 'returns' => true, 'buyer_id' => 1, 'user_id' => 2),
				array( 'card_id' => 21, 'card_price' => 12.99,'quantity' => 1, 'item_condition' => 'New', 'free_postage' => true,'postage_cost' => 0, 'item_location' => 'United Kingdom', 'post_to' => 'European Union', 'dispatch_time' => '2 working day', 'returns' => true, 'buyer_id' => 1, 'user_id' => 3),
				array( 'card_id' => 56, 'card_price' => 12.99,'quantity' => 1, 'item_condition' => 'New', 'free_postage' => true,'postage_cost' => 0, 'item_location' => 'United Kingdom', 'post_to' => 'European Union', 'dispatch_time' => '2 working day', 'returns' => true, 'buyer_id' => 1, 'user_id' => 2),
			)
		);
	}
}