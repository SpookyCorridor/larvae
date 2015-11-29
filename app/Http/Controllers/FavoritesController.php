<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Favorite; 
use App\Article; 
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FavoritesController extends Controller
{
    public function store($id)
    {	
    	$article = Article::find($id);
    	$fav = Favorite::where('article_id', $id)->first(); 
    	if ($fav) {
    		$count = $fav->count() + 1;
    		$fav->count = $count; 
    		$fav->save(); 
    	} else {
    		$fav = Favorite::create([
	    		'article_id' => $id,
	    		'count' => 1
	    		]); 
	    } 
    	\Auth::user()->favorites()->attach($fav); 
    	return view('articles.show', compact('article')); 
    	
    }
}
