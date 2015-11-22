<?php

namespace App;

use Carbon\Carbon; 
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
    	'title',
    	'body',
    	'published_at'
    ];

    protected $dates = ['published_at']; // part of laravel's model & makes it
    																		 // a carbon instance 
    //query scope
    public function scopePublished($query)
    {
    	$query->where('published_at', '<=', Carbon::now()); 
    }

    public function scopeUnpublished($query)
    {
    	$query->where('published_at', '>', Carbon::now()); 
    }

    //mutator 
    public function setPublishedAtAttribute($date)
    {
    	$this->attributes['published_at'] = Carbon::parse($date); 
    	// add time set to midnight with carbon parse 
    }

    //owner, writer...could be named anything
    public function user() 
    {
        return $this->belongsTo('App\User'); 
    }
}
