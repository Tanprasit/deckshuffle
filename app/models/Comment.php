<?php

require 'vendor/autoload.php';

use Carbon\Carbon;


class Comment extends Eloquent {
	protected $table ='comments';
	protected $fillable = array('id', 'user_id', 'card_id', 'comment', 'rating');

	public function card()
	{
		return $this->belongsTo('Card');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}
}