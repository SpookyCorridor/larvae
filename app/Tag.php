<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public functoin articles()
    {
    	return $this->belongsToMany('App\Article')
    }
}
