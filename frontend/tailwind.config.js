module.exports = {
    content: [
        './assets/**/*.{js,ts,jsx,tsx}',
        './public/assets/js/index.js',
        // './vendor/buzzingpixel/mission-control-frontend-core/**/*.phtml',
        '../../frontend-core/**/*.phtml',
        // './node_modules/buzzingpixel-mission-control-frontend-core/assets/**/*.{js,ts,jsx,tsx}',
        '../../frontend-core/assets/**/*.{js,ts,jsx,tsx}',
        '../../frontend-core/dist/**/*.{js,jsx}',
        // './node_modules/buzzingpixel-mission-control-url-monitoring/assets/**/*.{js,ts,jsx,tsx}',
        '../../url-monitoring/assets/**/*.{js,ts,jsx,tsx}',
        '../../url-monitoring/dist/**/*.{js,jsx}',
    ],
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
    ],
};
