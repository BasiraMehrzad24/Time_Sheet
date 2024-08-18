const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                'black': '#1E2432',
                'white': '#FFFFFF',
                'green': '#18B69B',
                'green-light': '#E8F8F5',
                'green-lighter': '#F0F6F9',
                'gray-dark': '#80848F',
                'gray-light': '#E5E7EB',
                'orange': '#F2994A',
                'red': '#E85155',
                teal: colors.teal,
                cyan: colors.cyan,
            },
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
        },

    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio')
    ],
};