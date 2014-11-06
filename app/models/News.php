<?php

class News extends Eloquent {
	protected $table = "news";
	protected $fillable = [
		'title',
		 'text'
	];

	// public function comments() {
	// 	return $this->hasMany('Comment');
	// }
}