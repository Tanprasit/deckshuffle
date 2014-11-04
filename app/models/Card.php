<?php

class Card extends Eloquent {
protected $table = 'cards';
	protected $fillable = array('level', 'colour', 'cost', 'trigger', 'power', 'soul', 'traits', 'series_id', 'name', 'jap_name', 'eng_text', 'eng_text2', 'jap_text', 'jap_text2', 'type', 'unique_identifier', 'rating');
	public $timestamps = false;

	public function series() {
		return $this->belongsTo('Series');
	}
	public function comments() 
	{
		return $this->hasMany('Comment');
	}
	public function getTotalCommentsAttribute()
	{
		return $this->hasMany('Comment')->whereCardId($this->id)->count();
	}
}