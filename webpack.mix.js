const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .js('resources/js/app.js', 'public/js') 
    .js('resources/js/blog/scripts.js', 'public/js/blog') 
    .css('resources/css/admin/styles.css','public/css/admin')
    .css('resources/css/blog/styles.css','public/css/blog')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
