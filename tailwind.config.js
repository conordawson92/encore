/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        fontFamily: {
            abel: ["Abel", "sans-serif"],
        },
        extend: {
            colors: {
                // colorName: 'colorValue',
                orange_logo: "#f5804d",
                orange_logo_light: "#ff9e73",
                beige_logo: "#fff4e0",
                beige_logo_hover: "#e6d2b1",
                brown_logo: "#6d3114",
                brown_logo_light: "#a04a20",
                mustard_logo: "#DCBC6C",
            },
            keyframes: {},
            screens: {
                customLg: "960px",
            },
            boxShadow: {
                'custom': '0 5px 5px -3px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 1px -2px rgba(0, 0, 0, 0.12)'
              },
        },
    },
    plugins: [],
};
