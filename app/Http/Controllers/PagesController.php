<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about()
    {
    	$data = [
    		"first" => "Mochi",
    		"last" => "Tsuki"
    	];
    	return view('pages.about', $data); //same as pages/about 
    }
}


