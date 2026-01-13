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
                // Page Backgrounds
                page: {
                    DEFAULT: '#FAFAFA',
                    section: '#F4F5F7',
                    card: '#FFFFFF',
                },
                // Brand Gold Colors
                gold: {
                    light: '#F2E6B8',
                    DEFAULT: '#D6B45A',
                    dark: '#B89A3C',
                    50: '#FCF9EF',
                    100: '#F7F0D9',
                    200: '#F2E6B8',
                    300: '#E8D48A',
                    400: '#DFC25C',
                    500: '#D6B45A',
                    600: '#C4A34E',
                    700: '#B89A3C',
                    800: '#9A7E2F',
                    900: '#7C6324',
                },
                // Primary alias (same as gold for brand consistency)
                primary: {
                    light: '#F2E6B8',
                    DEFAULT: '#D6B45A',
                    dark: '#B89A3C',
                    500: '#D6B45A',
                    600: '#C4A34E',
                    700: '#B89A3C',
                },
                // Text Colors
                text: {
                    primary: '#1F2933',
                    secondary: '#4B5563',
                    muted: '#6B7280',
                },
                // Border & Divider
                border: {
                    light: '#E5E7EB',
                    DEFAULT: '#E5E7EB',
                    divider: '#EAECEF',
                },
                // Status colors
                success: '#10B981',
                warning: '#F59E0B',
                error: '#EF4444',
                info: '#3B82F6',
            },
            fontFamily: {
                sans: ['Inter', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                'soft': '0 2px 8px rgba(0, 0, 0, 0.04)',
                'soft-md': '0 4px 12px rgba(0, 0, 0, 0.06)',
                'soft-lg': '0 8px 24px rgba(0, 0, 0, 0.08)',
                'soft-xl': '0 12px 32px rgba(0, 0, 0, 0.10)',
                'card': '0 1px 3px rgba(0, 0, 0, 0.04), 0 2px 8px rgba(0, 0, 0, 0.04)',
                'card-hover': '0 4px 16px rgba(0, 0, 0, 0.08)',
            },
            borderRadius: {
                'xl': '0.875rem',
                '2xl': '1rem',
                '3xl': '1.25rem',
            },
        },
    },

    plugins: [forms],
};
