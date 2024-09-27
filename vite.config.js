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
					name: env.VITE_APP_NAME,
					short_name: env.VITE_APP_NAME,
					theme_color: '#ff00ff',
					lang: 'en',
					start_url: '/tasks',
					icons: [
						{
							src: "/assets/img/logo-512x512.png",
							sizes: "512x512",
							type: "image/png"
						},
						{
							src: "/assets/img/logo-512x512-maskable.png",
							sizes: "512x512",
							type: "image/png",
							purpose: "maskable"
						}
					]
				},
				devOptions: {
					enabled: false
				},
			})
		],
	}
})
