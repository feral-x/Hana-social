/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/**/**/*.vue",
    ],
  theme: {
    extend: {},
      colors: {
          silver: '#d9d9d9', // #E53935
          primary: '#1F1F1F',
          danger: '#ed2553',
          white: '#fff',
          gray: '#4D4D4D'
      }
  },
  plugins: [],
}
