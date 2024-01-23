import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import colors from 'tailwindcss/colors';

const { iconsPlugin, getIconCollections } = require("@egoist/tailwindcss-icons")

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                headerfont: ['Comfortaa Variable', ...defaultTheme.fontFamily.sans],
                sans: ['Noto Sans TC Variable', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                daymainbg: {
                    DEFAULT: colors.white,
                    dark: colors.gray[100],
                },
                nightmainbg: {
                    light: colors.gray[700],
                    DEFAULT: colors.gray[800],
                    dark: colors.gray[900],
                },
                firstcolor: colors.teal,
                secondcolor: colors.yellow,
            },
        },
    },

    plugins: [
        forms,
        iconsPlugin({
            collections: getIconCollections(["lucide", "game-icons"]),
        }),
    ],
};
