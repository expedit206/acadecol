import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                serif: ["Merriweather", ...defaultTheme.fontFamily.serif],
            },
            colors: {
                acadecol: {
                    blue: "#0F172A", // Institutional Navy
                    gold: "#F59E0B", // Excellence/Cameroon Gold
                    light: "#F8FAFC",
                },
            },
        },
    },

    plugins: [forms],
};
