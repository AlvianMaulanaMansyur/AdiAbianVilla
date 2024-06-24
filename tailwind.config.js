/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./application/views/partials/header.php"],
  theme: {
    extend: {},
  },
  plugins: [
    require('tailwindcss'),
    require('autoprefixer'),
  ],
}

