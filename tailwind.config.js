import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js',
    ],
    // Safe list for dynamic Post category variables
    safelist: [
        {
            pattern: /(bg|text|from|to)-(category)-(videogames|news|technology|sports|music|movies|tv|books|travel|fashion|health|downloads|programming)/,
        },
    ],

    darkMode: 'media',

    theme: {
        extend: {
            transitionProperty: {
                'hidden': 'hidden',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                oswald: ['Oswald', ...defaultTheme.fontFamily.sans],
                anton: ['Anton', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'category': {
                    videogames: '#c18626',
                    news: '#6200ea',
                    technology: '#f43d1d',
                    sports: '#4ff9e0',
                    music: '#1f91b7',
                    movies: '#aa1d05',
                    tv: '#ba1b43',
                    books: '#03a320',
                    travel: '#f50057',
                    fashion: '#c98a04',
                    health: '#2962ff',
                    downloads: '#7bf954',
                    programming: '#ce127d',
                }
            }
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin'),
        require('@tailwindcss/typography'),
    ],
};
