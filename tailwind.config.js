module.exports = {
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            fontFamily: {
                main: ["Poppins", "sans-serif"],
            },
        },
    },
    corePlugins: {},
    variants: {
        extend: {},
        outline: ["focus"],
    },
    plugins: [require("@tailwindcss/forms")],
};
