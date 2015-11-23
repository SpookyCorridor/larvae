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

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]); 
    }

    public function index()
    {

    	$articles = Article::latest('published_at')->published()->get(); 
    	// latest is a symbol for: 
    	// Article::order_by('published_at', 'desc')->get(); 

    	//published() is a scope we made on Article model 

    	return view('articles.index', compact('articles')); 
    }

    public function show(Article $article) //reference the underlying object
                             // and let laravel do the querying work for you 
    {
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
        //create a new article with attributes from form
        $article = new Article($request->all()); 
        //get authenticated users articles and save a new one 
        //calling method form of articles to chaining 
        
        \Auth::user()->articles()->save($article); 
     //Auth::user()->articles()->create($request->all()); yields same result


        //temporary message to flash on the screen thru layout 
        session()->flash('flash_message', 'Your article has been created!'); 
   
    	return redirect('articles'); 
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article, ArticleRequest $request)
    //laravel uses reflection to see: hey, they want a request object
    //so I'll pass it in for them. 
    { 
        $article->update($request->all()); 

        return redirect('articles'); 
    }
}
