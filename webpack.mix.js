let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |	q
 */

mix	.js('resources/assets/js/front/front.js', 'public/js')
    .js('resources/assets/js/back/back.js', 'public/js')
    .scripts([
        'node_modules/startbootstrap-sb-admin/js/sb-admin.js'
    ], 'public/js/vendor.js')
    .styles([
        'node_modules/startbootstrap-sb-admin/css/sb-admin.min.css'
    ], 'public/css/vendor.css')
    .sass('resources/assets/sass/back/back.scss', 'public/css')
    .sass('resources/assets/sass/front/front.scss', 'public/css')
    .copy('node_modules/startbootstrap-sb-admin/vendor/','public/vendor')
    .copy('resources/assets/fonts/','public/fonts/')
    .version();