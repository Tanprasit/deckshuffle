<?php

class Post extends Eloquent {
	protected $table = 'posts';
	protected $fillable = array('user_id', 'card_id', 'card_price', 'quantity', 'free_postage', 'postage_cost', 'item_condition', 'item_location', 'post_to', 'dispatch_time', 'returns', 'buyer_id	');
	protected $hidden = ['buyer_id'];

	public function user() {
		return $this->belongsTo('User');
	}

	public function card() {
		return $this->belongsTo('Card');
	}
	// maybe called using : $user->greeting
	public function getGreetingAttribute() {
		return 'hello there';
	}
}