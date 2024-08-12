const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
			colors: [
				'primary',
				'secondary',
				'error',
			].map(item => ({
				[item]: `rgba(var(--color-${item}), <alpha-value>)`
			})).reduce((acc, obj) => ({...acc, ...obj}), {})
        },
    },
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
		require("tw-elements/plugin.cjs")
    ],
}
