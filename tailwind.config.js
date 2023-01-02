/** @type {import('tailwindcss').Config} */

const colors = require('tailwindcss/colors');

module.exports = {
    darkMode: 'class',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    safelist: [
        'list-disc',
        'list-decimal',
        'list-numeric',
        'list-none',
        'list-inside',
        'list-outside',
        'text-1xl',
        'text-2xl',
        'text-3xl',
        'text-4xl',
        'text-5xl',
        'text-6xl',
        'text-7xl',
        'text-8xl',
        'text-9xl',
    ],
    theme: {
        extend: {
            colors: {
                'main': '#FF9637',
                'secondary' : '#FFF0E2',
                'tertiary' : '#2A3042',
                'tertiary-text' : '#A6B0CF',
                'tertiary-active' : '#363d54',
                'bronze' : '#945D41',
                'silver' : '#797B89',
                'main-active': '#fc7f0d',
                'white': '#FFFFFF',
                'border': '#E8E9ED',
                'button': '#C6C8D3',
                gray: colors.gray,
                slate: colors.slate,
                green: colors.green,
                blue: colors.blue,
                rose: colors.rose,
                orange: colors.orange,
                'areakerja': '#FF9637',
                'transparent': 'transparent',
                'current': 'currentColor',
                'polar1': '#2E3440',
                'polar2': '#3B4252',
                'polar3': '#434C5E',
                'polar4': '#4C566A',
                'storm1': '#D8DEE9',
                'storm2': '#E5E9F0',
                'storm3': '#ECEFF4',
                'frost1': '#8FBCBB',
                'frost2': '#88C0D0',
                'frost3': '#81A1C1',
                'frost4': '#5E81AC',
                'error': '#BF616A',
                'danger': '#D08770',
                'warning': '#EBCB8B',
                'success': '#A3BE8C',
                'visited': '#B48EAD',
            },
            spacing: {
                // 'min15' : '-10px',
                // '18' : '4.5rem',
                '95%' : '95%',
                '20px' : '20px',
                '614px' : '614px',
                '479px' : '479px',
                '30%' : '30%',
                '23%' : '23%',
                '24.4rem' : '24.4rem',
            },
            fontSize: {
                '1xl': ['20px', '28px'],
            }
        },
    },
    plugins: [],
}
