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
    mix.sass('app.scss', 'resources/css') //second arg = output 
    .styles([
    	'libs/bootstrap.min.css',
    	'app.css',
    	'libs/select2.min.css', 
    ], 'public/output/larvae.css', 'resources/css')
    .scripts([
    	'libs/jquery.min.js',
    	'libs/bootstrap.min.js',
    	'libs/select2.min.js',
        'main.js',
    ], 'public/output/scripts.js', 'resources/js'); 
});
