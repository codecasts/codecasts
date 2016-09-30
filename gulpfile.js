const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

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

elixir(mix => {
    // Application Styles
    mix.sass('app.scss');

    // Application Scripts
    mix.webpack('app.js');

    // Vendor Scripts (Outside Webpack)
    mix.scripts([
        'afterglow.min.js'
    ], 'public/js/vendor.js');

    // version (hash) asset files
    mix.version([
        'css/app.css',
        'js/app.js',
        'js/vendor.js',
    ]);

    // Copy Images
    mix.copy('resources/assets/img', 'public/img');
});
