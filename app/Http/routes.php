<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('about', 'PagesController@about'); 
Route::get('contact', 'PagesController@contact'); 

Route::resource('articles', 'ArticlesController'); 

Route::get('tags/{tags}', 'TagsController@show'); 

Route::get('bookmark/{article}', 'FavoritesController@store'); 
Route::get('/bookmarks', 'FavoritesController@show'); 
Route::get('/bookmarks/remove/{id}', 'FavoritesController@delete');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController', 
]); 