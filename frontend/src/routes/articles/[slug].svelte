<script lang="ts">
	import { page } from '$app/stores';
	import { articles } from '../../stores/articles';
	import { derived } from 'svelte/store';
	import snarkdown from 'snarkdown';
	import type { Article } from '@api/article';

	$: article = derived(page, ($page): Article => {
		const slug = $page.params.slug;

		return $articles.find((article) => article.slug === slug)!;
	});

	$: render = snarkdown($article.body);
</script>

<main class="container max-w-2xl mx-auto px-4 my-10 mb-60">
	<div class="flex items-center">
		<span class="text-gray-400 pr-2">Author: </span>
		<p class="text-gray-400">{$article.author.username}</p>
	</div>
	<h1 class="text-4xl text-white font-semibold my-2">{$article.title}</h1>
	<div class="border-b border-gray-400 mb-5" />

	<article class="prose lg:prose-sm dark:prose-invert">
		{@html render}
	</article>
</main>
