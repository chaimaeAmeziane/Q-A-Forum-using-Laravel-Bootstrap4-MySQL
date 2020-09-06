<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
	protected $guarded = [];
    //un topic appartient a un seul utilisateur
    public function user()
    {
    	return $this->belongsto('App\User');
    }
    public function comments()
    {
    	return $this->morphMany('App\Comment','commentable')->latest();
    }
}
