<?php

namespace App\Http\Controllers;

use Request; 
use App\Article; //importing model created 
use Carbon\Carbon; 
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index()
    {
    	$articles = Article::latest('published_at')->get(); 
    	// latest is a symbol for: 
    	// Article::order_by('published_at', 'desc')->get(); 

    	return view('articles.index', compact('articles')); 
    }

    public function show($id)
    {
    	$article = Article::findOrFail($id); //renders 404 page if not found 

    	// dd($article) will show null if non existing id or verbose information 
    	// on existing information 

    	return view('articles.show', compact('article')); 
    }

    public function create() 
    {
    	return view('articles.create'); 
    }

    public function store()
    {
    	$input = Request::all(); // from use Request injection above to get 
    													 // all headers from form request 
    	$input['published_at'] = Carbon::now(); 
    	Article::create($input); 

    	return redirect('articles'); 
    }
}
