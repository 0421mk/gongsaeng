let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

 var LiveReloadPlugin = require('webpack-livereload-plugin');

 mix.webpackConfig({
     plugins: [
         new LiveReloadPlugin()
     ]
 });

mix.sass('resources/assets/sass/main/style.scss', 'public/css/main')
   .sass('resources/assets/sass/main/fonts.scss', 'public/css/main');
