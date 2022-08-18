const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            colors: {
                primary: {
                    50: "#E1F5FE",
                    100: "#FDFEFE",
                    200: "#E8F3FE",
                    300: "#93c5fd",
                    400: "#77B6FB",
                    500: "#3b82f6",
                    600: "#2382F7",
                    700: "#0091EA",
                    800: "#1557C0",
                    900: "#0F3375",
                },
                gray: {
                    50: "#ECEFF1",
                    200: "#CFD8DC",
                    700: "#455A64",
                    900: "#263238",
                },
                success: {
                    50: "#E8F5E9",
                    700: "#00C853",
                },
                warning: {
                    50: "#FFF8E1",
                    700: "#FFAB00",
                },
                danger: {
                    50: "#FFEBEE",
                    700: "#D50000",
                },
            },
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require("@tailwindcss/forms"), require("flowbite/plugin")],
};
