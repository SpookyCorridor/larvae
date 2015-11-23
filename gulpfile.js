var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
    .styles([
    	'vendor/normalize.css',
    	'app.css'
    ], 'public/output/larvae.css', 'public/css')
    .scripts([
    	'vendor/jquery.js',
    	'main.js'
    ], 'public/output/scripts.js', 'public/js'); 
});
