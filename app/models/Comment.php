<?php

class Comment extends Eloquent {
	protected $table ='comments';
	protected $fillable = array('user_id', 'card_id', 'comment','rating');

  	public function user()
	{
		return $this->belongsTo('User');
	}

	public function card()
	{
		return $this->belongsTo('Card');
	}
}