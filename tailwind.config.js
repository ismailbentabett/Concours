import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                bittersweet: {
                    50: "#fef3f2",
                    100: "#fee4e2",
                    200: "#ffccc9",
                    300: "#fdaaa4",
                    400: "#fa7269",
                    500: "#f24c41",
                    600: "#df2f23",
                    700: "#bc2319",
                    800: "#9b2119",
                    900: "#81211b",
                    950: "#460d09",
                },
                concgreen: {
                    500: "#839795",
                    600: "#687474",
                    700: "#292325",
                },
            },
        },
    },

    plugins: [
        forms,
        require("@tailwindcss/typography"),
        require("@tailwindcss/aspect-ratio"),
        require("@tailwindcss/line-clamp"),
    ],
};
