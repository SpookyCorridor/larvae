<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article; //importing model created 
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index()
    {
    	$articles = Article::all(); 

    	return view('articles.index', compact('articles')); 
    }

    public function show($id)
    {
    	$article = Article::findOrFail($id); //renders 404 page if not found 

    	// dd($article) will show null if non existing id or verbose information 
    	// on existing information 

    	return view('articles.show', compact('article')); 
    }
}
