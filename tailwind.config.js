/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {},
    },

    daisyui: {
        themes: false,
    },

    plugins: [require("@tailwindcss/forms"), require("daisyui")],
};
