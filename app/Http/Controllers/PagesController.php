<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about()
    {
    	$movies = [ //laravel collection - example of dataset info from somewhere 
    		'Frank', 'Event Horizon', 'Labyrinth' 
    	]; 

    	return view('pages.about', compact('movies')); //same as pages/about 
    }

    public function contact()
    {
    	return view('pages.contact'); 
    }
}


