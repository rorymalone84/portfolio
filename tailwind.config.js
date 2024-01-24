import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        fontFamily: {
            primary: "Playfair Display",
            body: "Work Sans",
            logo: "Grape Nuts"
        },
        container:{
            default: "1rem",
            lg: "3rem"
        },
        extend:{
            colors:{
                "light-primary": "#E3FDFD",
                "light-secondary": "#CBF1F5",
                "light-tertiary": "#A6E3E9",
                "light-quaternary": "#71C9CE",
                "dark-primary": "#222831",
                "dark-secondary": "#393E46",
                "dark-tertiary": "#29ADB5",
                "dark-quaternary": "#71C9CE",
                blue : colors.blue,
                indigo: colors.indigo,
                green: colors.green,
                red: colors.red
            },
            backgroundImage: {
                'light-hero-image': "url('images/light-background.jpg')",
                'dark-hero-image': "url('images/dark-background.jpg')",
            }
        }
    },

    plugins: [forms],
};
