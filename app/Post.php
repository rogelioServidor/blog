<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function comments(){
    	return $this->hasMany('App\Comment');
    }

    protected $fillable = ['title','user_id','body','visible'];


    public function setVisibleAttribute($value){
    	$this->attributes['visible'] = (boolean)($value);
    }
}
