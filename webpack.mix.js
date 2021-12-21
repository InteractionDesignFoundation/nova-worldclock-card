// eslint-disable-next-line no-undef
const mix = require('laravel-mix');

mix
    .setPublicPath('dist')
    .js('resources/js/card.js', 'js')
    .vue();

if (mix.inProduction()) {
    mix.version();
}
