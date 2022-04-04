const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "grad-left": "#310134",
                "grad-center": "#3A0E3E",
                "grad-right": "#590D0D",
                "primary-dark": "#310134",
                "primary-color": "#3A0E3E",
                "secondary-color": "#c94b4b",
                "dark-color": "#230725",
                "pr-color": "#99659d",
                "gray-color": "#f2f2f2",
                "gray-cool": "#faf7f7",
                "success-color": "#66c272",
                "error-color": "#ff6d6d",
            },
            boxShadow: {
                bottom: "0 0 4px 4px rgb(0 0 0 / 8%)",
            },
            borderWidth: {
                5: "5px",
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
