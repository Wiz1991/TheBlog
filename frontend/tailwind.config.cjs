module.exports = {
  content: ['./src/**/*.{html,js,svelte,ts}'],
  darkMode: 'class',
  theme: {
    extend: {
      backgroundImage: {
        "hero-pattern": "url('./layered-waves-haikei.svg')",
        "hero-divider": "url('./wave-haikei.svg')",
      }
    },
  },
  plugins: [require('@tailwindcss/line-clamp'), require('@tailwindcss/typography')],
}
