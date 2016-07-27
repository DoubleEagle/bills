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

 var folders = {
     jquery: './node_modules/jquery/dist/',
     bootstrap: './node_modules/bootstrap-sass/assets/'
 };

 elixir(function (mix) {

     mix.sass('main.scss');

     mix.styles([
         './public/css/main.css'
     ], 'public/css/app.css', './');

     mix.scripts([
         folders.jquery + 'jquery.js',
         folders.bootstrap + 'javascripts/bootstrap.js',
         'table-checkbox.js'
     ]);

     mix.copy(folders.bootstrap + 'fonts/bootstrap/**', 'public/build/fonts/bootstrap');
     mix.copy('resources/img/**', 'public/img');
     mix.copy('resources/jquery-ui/**', 'public/build/css/images');

     mix.version(['css/app.css', 'css/app.css.map', 'js/all.js']);
 });
