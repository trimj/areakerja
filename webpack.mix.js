const mix = require('laravel-mix');

mix.js('resources/js/global.js', 'public/js')
    .postCss('resources/css/global.css', 'public/css', [
        require("tailwindcss"),
    ])
    .postCss('resources/css/main.css', 'public/css', [
        require("tailwindcss"),
    ])
    .postCss('resources/css/auth.css', 'public/css', [
        require("tailwindcss"),
    ])
    .postCss('resources/css/admin.css', 'public/css', [
        require("tailwindcss"),
    ])
    .postCss('resources/css/home.css', 'public/css', [
        require("tailwindcss"),
    ]);
