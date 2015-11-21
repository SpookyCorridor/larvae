<?php

namespace App\Http\Controllers;

use App\Article; //importing model created 
use Carbon\Carbon; 
use App\Http\Requests;
use App\Http\Requests\CreateArticleRequest; 
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index()
    {
    	$articles = Article::latest('published_at')->published()->get(); 
    	// latest is a symbol for: 
    	// Article::order_by('published_at', 'desc')->get(); 

    	//published() is a scope we made on Article model 

    	return view('articles.index', compact('articles')); 
    }

    public function show($id)
    {
    	$article = Article::findOrFail($id); //renders 404 page if not found 

    	
    	return view('articles.show', compact('article')); 
    }

    public function create() 
    {
    	return view('articles.create'); 
    }

    public function store(CreateArticleRequest $request) //validation 
    //validation is fired and if not valid, this block will not execute
    //and no article will be created. If it is valid, it will return with
    //the $request variable to use in the block. 
    {
    
    	Article::create($request->all()); 

    	return redirect('articles'); 
    }
}
