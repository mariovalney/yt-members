const mix = require('laravel-mix');

require('laravel-mix-imagemin');

mix.js('resources/js/app.js', 'public/js');
mix.js('resources/js/browserSync.js', 'public/js');

const vendorCss = [
    'resources/vendor/coreui/style.css',
];

mix.styles(vendorCss, 'public/css/vendor.css');

mix.sass('resources/sass/app.scss', 'public/css');

mix.imagemin('images');

mix.browserSync({
    open: false,
    notify: false
});

if (mix.inProduction()) {
    mix.version();
}

