/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      backgroundImage: {
        "primary": "url('http://127.0.0.1:8000/images/321266452_804746637965962_2076821837111370885_n.jpg')"
      },
    },
  },
  plugins: [],
}