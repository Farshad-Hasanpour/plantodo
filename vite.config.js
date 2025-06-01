import { defineConfig, loadEnv  } from 'vite'
import laravel from 'laravel-vite-plugin'
import { VitePWA } from 'vite-plugin-pwa';

export default defineConfig(({ mode }) => {
	const env = loadEnv(mode, process.cwd(), '');

	return {
		plugins: [
			laravel({
				input: ['resources/sass/app.scss', 'resources/js/app.js'],
				refresh: true,
			}),
			VitePWA({
				strategies: "injectManifest",
				srcDir: 'resources/js',
				filename: 'sw.js',
				inject: {
					// You can set up a custom destination here
					sw: 'public/sw.js', // The name of your service worker file
				},
				injectRegister: 'auto',
				registerType: 'autoUpdate',
				outDir: 'public',
				buildBase: '/',
				scope: '/',
				injectManifest: {
					injectionPoint: undefined
				},

				/*workbox: {
					globPatterns: ['**!/!*.{js,css,html,ico,png,svg,webp,jpg,jpeg,woff,eot,ttf}'],
					additionalManifestEntries: [{
						url: 'index.html', revision: null
					}],
				},*/
				manifest: {
					// TODO: env is not provided when deploying using github actions
					name: env.VITE_APP_NAME || 'PlanToDo',
					short_name: env.VITE_APP_NAME || 'PlanToDo',
					description: 'PlanToDo is powered by the TALL stack. It means Tailwind, Alpine.js, Livewire, and Laravel. The project is open source, and it\'s made primarily for educational purposes.',
					theme_color: '#EC4899',
					lang: 'en',
					start_url: '/tasks',
					"screenshots": [
						{
							"src": "/assets/img/screenshot-wide.png",
							"sizes": "1920x822",
							"type": "image/png",
							"form_factor": "wide",
							"label": "Desktop Dashboard"
						},
						{
							"src": "/assets/img/screenshot-narrow.png",
							"sizes": "724x1040",
							"type": "image/png",
							"form_factor": "narrow",
							"label": "Phone Dashboard"
						}
					],
					icons: [
						{
							src: "/assets/img/logo-512x512-maskable.png",
							sizes: "any",
							type: "image/png",
							purpose: "maskable"
						},
						{
							src: "/assets/img/logo.svg",
							sizes: "any",
							type: "image/svg+xml",
							purpose: "monochrome"
						},
						{
							src: "/assets/img/logo-512x512.png",
							sizes: "any",
							type: "image/png",
							purpose: "any"
						},
					]
				},
				devOptions: {
					enabled: false
				},
			})
		],
	}
})
