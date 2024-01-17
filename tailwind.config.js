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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                chalk: {
                    50: '#EEE2DE',
                },
                darkness: {
                    900: '#2B2A4C',
                },
                skin: {
                    50: '#EA906C'
                },
                blood: {
                    500: '#dc2626'
                }
            }
        },
    },

    plugins: [forms],
};
