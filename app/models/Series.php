<?php

class Series extends Eloquent {
	protected $table = 'series';
	protected $fillable = array('name', 'unique_identifier');

	public function cards() {
		return $this->hasMany('Card');
	}

	public function getUrlAttribute() {
		return URL::route('series.show', $this->id);
	}
}