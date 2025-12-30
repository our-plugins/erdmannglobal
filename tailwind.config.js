import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                // Primary Background
                dark: {
                    DEFAULT: '#0B0B0B',
                    100: '#141414',
                    200: '#1A1A1A',
                    300: '#2A2A2A',
                },
                // Gold Colors
                gold: {
                    light: '#F5D77A',
                    DEFAULT: '#D4AF37',
                    dark: '#9E7C19',
                    50: '#FBF7E8',
                    100: '#F5ECD0',
                    200: '#EBDAA1',
                    300: '#E0C772',
                    400: '#D4AF37',
                    500: '#D4AF37',
                    600: '#B8982E',
                    700: '#9E7C19',
                    800: '#7A6014',
                    900: '#56440E',
                },
                // Primary alias
                primary: {
                    light: '#F5D77A',
                    DEFAULT: '#D4AF37',
                    dark: '#9E7C19',
                    500: '#D4AF37',
                    600: '#B8982E',
                    700: '#9E7C19',
                },
                // Text Colors
                text: {
                    primary: '#FFFFFF',
                    secondary: '#CFCFCF',
                    muted: '#9A9A9A',
                },
                // Section backgrounds
                section: {
                    dark: '#141414',
                    light: '#F7F7F7',
                },
                // Border
                border: {
                    dark: '#2A2A2A',
                },
                // Status colors
                success: '#2ECC71',
                warning: '#F1C40F',
                error: '#E74C3C',
            },
            fontFamily: {
                sans: ['Inter', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'gold-gradient': 'linear-gradient(135deg, #F5D77A 0%, #D4AF37 50%, #9E7C19 100%)',
                'gold-gradient-hover': 'linear-gradient(135deg, #F5D77A 0%, #E5C547 50%, #B8982E 100%)',
            },
        },
    },

    plugins: [forms],
};
