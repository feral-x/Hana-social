/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/**/**/*.vue",
    ],
  theme: {
      colors: {
          silver: '#d9d9d9', // #E53935
          danger: '#ed2553',
          white: '#fff',
          gray: '#4D4D4D',
          hover: '#666',
          primary: '#1F1F1F',
      },
    extend: {},
  },
}
