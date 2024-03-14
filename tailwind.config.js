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
        screens: {
            'sm': '576px',
            // => @media (min-width: 576px) { ... }

            'md': '960px',
            // => @media (min-width: 960px) { ... }

            'lg': '1024px',
            // => @media (min-width: 1440px) { ... }
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                chalk: {
                    50: '#EEE2DE',
                },
                darkness: {
                    900: '#0D0B1C',
                },
                skin: {
                    50: '#EA906C'
                },
                blood: {
                    500: '#B31315'
                }
            }
        },
    },

    plugins: [forms],
};
