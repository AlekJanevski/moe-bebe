import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                noir: ['Noir Pro', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                secondary: '#A7C1EB',
                link: '#01A3D6',
            },
            backgroundImage: {
                'primary-gradient': 'linear-gradient(to bottom, #A7C1EB, #ffffff)',
            },
        },
    },

    plugins: [forms],
};
