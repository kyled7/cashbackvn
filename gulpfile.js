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

var bowerDir = './bower_components/';

elixir(function(mix) {
    mix.sass('app.scss')
        .styles([
            'jquery-ui/themes/start/jquery-ui.min.css',
            'wow/css/libs/animate.css'
        ], 'public/css', bowerDir)
        .styles([
            'AdminLTE/bootstrap/css/bootstrap.min.css',
            'font-awesome/css/font-awesome.min.css',
            'AdminLTE/plugins/select2/select2.min.css',
            'AdminLTE/dist/css/AdminLTE.min.css',
            'AdminLTE/dist/css/skins/skin-green.min.css'
        ], 'public/css/admin.css', bowerDir)
        .scripts([
            'jquery/dist/jquery.min.js',
            'globalize/lib/globalize.js',
            'globalize/lib/cultures/globalize.culture.vi-VN.js',
            'jquery-ui/jquery-ui.js',
            'wow/dist/wow.min.js',
            'bootstrap-sass/assets/javascripts/bootstrap.min.js',
            'Bootflat/bootflat/js/icheck.min.js',
            'bootstrap-autohidingnavbar/dist/jquery.bootstrap-autohidingnavbar.min.js',
        ], 'public/js/vendor.js', bowerDir)
        .scripts([
            'AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js',
            'AdminLTE/bootstrap/js/bootstrap.min.js',
            'AdminLTE/dist/js/app.min.js',
            'AdminLTE/plugins/select2/select2.full.min.js'
        ], 'public/js/admin.js', bowerDir)
        .copy([
            bowerDir + 'font-awesome/fonts',
            bowerDir + 'bootstrap-sass/assets/fonts'
        ], 'public/fonts')
        .copy([
            bowerDir + 'jquery-ui/themes/start/images'
        ], 'public/css/images');
});
