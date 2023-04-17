module.exports = {
    content: [
        './assets/**/*.{js,ts,jsx,tsx}',
        // './vendor/buzzingpixel/mission-control-frontend-core/**/*.phtml',
        '../../frontend-core/**/*.phtml',
        // './node_modules/buzzingpixel-mission-control-frontend-core/assets/**/*.{js,ts,jsx,tsx}',
        '../../frontend-core/assets/**/*.{js,ts,jsx,tsx}',
    ],
    plugins: [
        require('@tailwindcss/typography'),
    ],
};
