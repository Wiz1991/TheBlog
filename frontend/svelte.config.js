import adapter from '@sveltejs/adapter-auto';
import preprocess from 'svelte-preprocess';
import { resolve } from 'path'

/** @type {import('@sveltejs/kit').Config} */
const config = {
	// Consult https://github.com/sveltejs/svelte-preprocess
	// for more information about preprocessors
	preprocess: preprocess(),

	kit: {
		adapter: adapter(),
		vite: {
			resolve: {
				alias: [
					{ find: '@components', replacement: "/src/components" },
					{ find: '@api', replacement: "/src/api" },
					{ find: '@stores', replacement: "/src/stores" }
				]
			}
		}
	}
};

export default config;
