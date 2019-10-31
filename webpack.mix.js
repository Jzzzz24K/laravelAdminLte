const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js').sass('resources/sass/app.scss', 'public/css');

//select2插件
mix.copy('node_modules/admin-lte/bower_components/select2/dist/css/select2.min.css','public/css/select2.min.css');
mix.copy('node_modules/admin-lte/bower_components/select2/dist/js/select2.full.js','public/js/select2.full.js');
//dataTable插件
mix.copy('node_modules/admin-lte/bower_components/datatables.net/js/jquery.dataTables.js','public/js/datatables.js');
