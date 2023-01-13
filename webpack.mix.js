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
    .js('resources/assets/js/functions.js', 'public/js')
    .js('resources/assets/vendor/aos/aos.js', 'public/js')
    .js('resources/assets/vendor/apexcharts/js/apexcharts.min.js', 'public/js')
    .js('resources/assets/vendor/choices/js/choices.min.js', 'public/js')
    .js('resources/assets/vendor/glightbox/js/glightbox.js', 'public/js')
    .js('resources/assets/vendor/imagesLoaded/imagesloaded.js', 'public/js')
    .js('resources/assets/vendor/isotope/isotope.pkgd.min.js', 'public/js')
    .js('resources/assets/vendor/plyr/plyr.js', 'public/js')
    .js('resources/assets/vendor/purecounterjs/dist/purecounter_vanilla.js', 'public/js')
    .js('resources/assets/vendor/quill/js/quill.min.js', 'public/js')
    .js('resources/assets/vendor/stepper/js/bs-stepper.min.js', 'public/js')
    .js('resources/assets/vendor/sticky-js/sticky.min.js', 'public/js')
    .js('resources/assets/vendor/tiny-slider/tiny-slider.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
        'resources/css/app.css',
        'resources/assets/css/style.css',
        'resources/assets/vendor/aos/aos.css',
        'resources/assets/vendor/apexcharts/css/apexcharts.css',
        'resources/assets/vendor/choices/css/choices.min.css',
        'resources/assets/vendor/font-awesome/css/all.min.css',
        'resources/assets/vendor/glightbox/css/glightbox.css',
        'resources/assets/vendor/overlay-scrollbar/css/OverlayScrollbars.min.css',
        'resources/assets/vendor/plyr/plyr.css',
        'resources/assets/vendor/quill/css/quill.snow.css',
        'resources/assets/vendor/stepper/css/bs-stepper.min.css',
        'resources/assets/vendor/tiny-slider/tiny-slider.css',
        'resources/assets/vendor/bootstrap-icons/bootstrap-icons.css',
    ], 'public/css/app.css')
