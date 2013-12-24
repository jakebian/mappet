<?php

class Place extends Eloquent {
	protected $guarded = array();

	public function submaps()
    {
        return $this->belongsToMany('Submap');
    }

    public function visited_by()
    {
        return $this->belongsToMany('User');
    }
    public function creator(){
        return $this->belongsTo('User');
    }

	public static $rules = array();
}
