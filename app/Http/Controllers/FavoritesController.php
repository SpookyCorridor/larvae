<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; 
use App\Favorite; 
use App\Article; 
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FavoritesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function store($id)
    {	
        $user = \Auth::user(); 
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
    	return view('articles.show', compact('article', 'user')); 
    	
    }

    public function delete($id)
    {
        $user = \Auth::user(); 
        $article = Article::find($id); 
        $fav = Favorite::where('article_id', $id)->first(); 
        \Auth::user()->favorites()->detach($fav); 
        $count = $fav->count() - 1; 
        $fav->save(); 
        return redirect()->action('ArticlesController@show', $article);
    }

    public function show()
    {	
    	$user = \Auth::user()->id; 
    	$test = User::find($user); 
    	
    	$favorites = $test->favorites()->get(); 

    	$articles = Article::findMany($favorites->lists('article_id'));  
 
    	return view('articles.index', compact('articles')); 
    }

}
