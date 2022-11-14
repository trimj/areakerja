/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
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
        },
    },
    plugins: [],
}
