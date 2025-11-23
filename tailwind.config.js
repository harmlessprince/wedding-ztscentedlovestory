export default {
    mode: "jit",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/views/*.blade.php",
        "./resources/js/**/*.vue",
        "./resources/**/*.js",
        "./resources/**/*.css",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'Playwrite NZ Guides', 'sans-serif'],
            },
        },
    },
};
