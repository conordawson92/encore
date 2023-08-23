/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    fontFamily: {
        abel: ['Abel', 'sans-serif'],
        },
    extend: {     
        colors: {
        // colorName: 'colorValue',
        orange_logo: '#f5804d',
        orange_logo_light: '#ff9e73',
        beige_logo: '#fff4e0',
        beige_logo_hover: '#e6d2b1',
        brown_logo: '#6d3114',
        brown_logo_light: '#a04a20'
        },
        keyframes: {}
    },
  },
  plugins: [],
}

