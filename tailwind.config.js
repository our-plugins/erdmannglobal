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
<<<<<<< HEAD
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
=======
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
>>>>>>> master
            },
            fontFamily: {
                sans: ['Inter', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
<<<<<<< HEAD
            backgroundImage: {
                'gold-gradient': 'linear-gradient(135deg, #F5D77A 0%, #D4AF37 50%, #9E7C19 100%)',
                'gold-gradient-hover': 'linear-gradient(135deg, #F5D77A 0%, #E5C547 50%, #B8982E 100%)',
=======
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
>>>>>>> master
            },
        },
    },

    plugins: [forms],
};
