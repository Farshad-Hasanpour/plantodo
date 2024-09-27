const defaultTheme = require('tailwindcss/defaultTheme')
const plugin = require("tailwindcss/plugin");

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
			inset: {
				"-100": "-100%",
			},
			backgroundSize: {
				full: "100%",
			},
			colors: [
				'primary',
				'secondary',
				'error',
				'attention'
			].map(item => ({
				[item]: `rgba(var(--color-${item}), <alpha-value>)`
			})).reduce((acc, obj) => ({...acc, ...obj}), {}),
        },
    },
	safelist: [
		'bg-error-100',
		'bg-success-100',
		'border-error',
		'border-success'
	],
    variants: {
        extend: {
            backgroundColor: ['active'],
        }
    },
    content: [
        './app/**/*.php',
        './resources/**/*.html',
        './resources/**/*.js',
        './resources/**/*.jsx',
        './resources/**/*.ts',
        './resources/**/*.tsx',
        './resources/**/*.php',
        './resources/**/*.vue',
        './resources/**/*.twig',
		"./node_modules/tw-elements/js/**/*.js"
    ],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
		require("tw-elements/plugin.cjs"),
		plugin(function ({ addComponents, theme }) {
			const screens = theme("screens", {});
			addComponents([
				{
					".landing-container": { width: "100%" },
				},
				{
					[`@media (min-width: ${screens.sm})`]: {
						".landing-container": {
							"max-width": "640px",
						},
					},
				},
				{
					[`@media (min-width: ${screens.md})`]: {
						".landing-container": {
							"max-width": "768px",
						},
					},
				},
				{
					[`@media (min-width: ${screens.lg})`]: {
						".landing-container": {
							"max-width": "1024px",
						},
					},
				},
				{
					[`@media (min-width: ${screens.xl})`]: {
						".landing-container": {
							"max-width": "1280px",
						},
					},
				},
				{
					[`@media (min-width: ${screens["2xl"]})`]: {
						".landing-container": {
							"max-width": "1280px",
						},
					},
				},
			]);
		}),
    ],
}
