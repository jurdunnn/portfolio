/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
        colors: {
            'primary': '#4f6d7a',
            'secondary': '#c0d6df',
            'secondary-light': '#dbe9ee',
            'tblue': '#4a6fa5',
            'lapis': '#166088',
        }
    },
    plugins: [],
}
