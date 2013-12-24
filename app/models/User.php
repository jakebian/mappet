<?php
use Cartalyst\Sentry\Users\Eloquent\User as SentryUserModel;
class User extends SentryUserModel {
    //your code here
    public function recorded()
    {
    	return $this->hasMany('Place'); 
    }
    public function visited(){
    	return $this->belongsToMany('Place');
    }
   	public function submaps_created(){
   		return $this->hasMany('Submap'); 
   	}
}
