<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
		protected $fillable = [

			'article_id',
			'count'
		]; 
		
    public function users()
    {
    	return $this->belongsToMany('App\User'); 
    }
}
