<?php

class Submap extends Eloquent {
	protected $guarded = array();
	public function creator(){
        return $this->belongsTo('User');
    }
    public function places()
    {
    	return $this->hasMany('Place'); 
    }
	public static $rules = array();
}
