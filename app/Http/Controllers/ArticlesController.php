<?php

namespace App\Http\Controllers;

use Request; 
use App\Article; //importing model created 
use Carbon\Carbon; 
use App\Http\Requests;
use App\Http\Requests\ArticleRequest; 
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

    public function store(ArticleRequest $request) //validation 
    //validation is fired and if not valid, this block will not execute
    //and no article will be created. If it is valid, it will return with
    //the $request variable to use in the block. 
    {
    
    	Article::create($request->all()); 

    	return redirect('articles'); 
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id); 
        return view('articles.edit', compact('article'));
    }

    public function update($id, ArticleRequest $request)
    //laravel uses reflection to see: hey, they want a request object
    //so I'll pass it in for them. 
    {
        $article = Article::findOrFail($id); 
        $article->update($request->all()); 

        return redirect('articles'); 
    }
}
