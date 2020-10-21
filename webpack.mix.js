const mix = require('laravel-mix');

require('dotenv').config();

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your WordPlate application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JavaScript files.
 |
 */


mix.setResourceRoot('web/app/themes/tandem');
mix.setPublicPath(`web/app/themes/tandem/theme/static`);

// mix.js('resources/scripts/app.js', 'scripts');
// mix.sass('resources/styles/editor.scss', 'styles');
mix.sass('web/app/themes/tandem/style/app.scss', 'styles');
mix.js("web/app/themes/tandem/scripts/app.js", 'scripts');
mix.version();
mix.disableNotifications();
