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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css').version();
mix.copy('node_modules/admin-lte/plugins/iCheck/icheck.js','public/js/icheck.js');
//select2插件
// mix.copy('node_modules/admin-lte/bower_components/select2/dist/css/select2.min.css','public/css/select2.min.css');
mix.copy('node_modules/admin-lte/bower_components/select2/dist/js/select2.full.js','public/js/select2.full.js');
//时间插件
mix.copy('node_modules/admin-lte/bower_components/bootstrap-daterangepicker/daterangepicker.css','public/css/daterangepicker.css');
mix.copy('node_modules/admin-lte/bower_components/moment/min/moment.min.js','public/js/moment.min.js');
mix.copy('node_modules/admin-lte/bower_components/bootstrap-daterangepicker/daterangepicker.js','public/js/daterangepicker.js');
mix.copy('node_modules/admin-lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js','public/js/bootstrap-datepicker.min.js');

