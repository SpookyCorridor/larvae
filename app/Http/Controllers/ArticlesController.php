<?php

namespace App\Http\Controllers;

use Request; 
use App\Article; //importing model created 
use App\Tag; 
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
        $user = false; 
        if (\Auth::user()->favorites()->find(1)) {
            $user = true; 
        } 
    	return view('articles.show', compact('article', 'user')); 
    }

    public function create() 
    {
        $tags = Tag::lists('name', 'id'); 
    	return view('articles.create', compact('tags')); 
    }

    public function store(ArticleRequest $request) //validation ArticleRequest
    //validation is fired and if not valid, this block will not execute
    //and no article will be created. If it is valid, it will return with
    //the $request variable to use in the block. 
    {
        
        $this->createArticle($request); 

        //temporary message to flash on the screen thru layout 
        session()->flash('flash_message', 'Your article has been created!'); 
   
    	return redirect('articles'); 
    }

    public function edit(Article $article)
    {
        $tags = Tag::lists('name', 'id'); 
        return view('articles.edit', compact('article', 'tags'));
    }

    public function update(Article $article, ArticleRequest $request)
    //laravel uses reflection to see: hey, they want a request object
    //so I'll pass it in for them. 
    { 
        $tags = (array) $request->input('tag_list'); 
        $article->update($request->all()); 
        $this->syncTags($article, $tags); 

        return redirect('articles'); 
    }

    private function syncTags(Article $article, array $tags)
    {
        //sync tags using many-to-many sync method to pivot table 
        //input grabs the tags selected by user from form 
        if (count($tags))
        {
            $article->tags()->sync($tags); 
        } else {
            $tags = []; 
            $article->tags()->sync($tags); 
        }
    }

    private function createArticle(ArticleRequest $request)
    {
        /* create a new article with attributes from form
           get authenticated users articles and save a new one 
           calling method form of articles to chaining */ 

        $article = \Auth::user()->articles()->create($request->all());
        $tags = (array) $request->input('tag_list'); 
       
        $this->syncTags($article, $tags); 
        
        return $article; 
    }
}
