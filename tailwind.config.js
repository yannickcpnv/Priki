const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        keyframes: {
            'fade-in-up': {
                '0%': {
                    opacity: '0',
                    transform: 'translateY(10px)',
                },
                '100%': {
                    opacity: '1',
                    transform: 'translateY(0)',
                },
            },
        },
        animation: {
            'fade-in-up': 'fade-in-up 0.5s ease-out',
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
}
