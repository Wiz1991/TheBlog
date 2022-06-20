<script lang="ts">
	import Badge from '@components/Badge.svelte';
	import Card from '@components/Card.svelte';
	import { getArticles, type Article, type ArticleCollection } from '@api/article';
	import { onMount } from 'svelte';
	import { articles } from '../stores/articles';
	import { getTags } from '@api/tags';

	let currentPage = 0;
	let limit = 5;

	onMount(async () => {
		const response = await getArticles(currentPage * limit);
		articles.reset();
		articles.append(response.data.articles);
	});

	const loadMore = async () => {
		const response = await getArticles(currentPage * limit);
		if (!response.data.articles.length) {
			currentPage -= 1;
			return;
		}
		articles.append(response.data.articles);
	};

	const loadTags = async () => {};

	$: currentPage && loadMore();
</script>

<main class="container max-w-6xl mx-auto mt-20 mb-52">
	<div>
		<h1
			class="text-center text-8xl  font-bold  tracking-wider bg-gradient-to-r from-purple-400 to-pink-600 bg-clip-text text-transparent"
		>
			The Blog
		</h1>
		<p class="text-center text-gray-400 text-lg mb-20 mt-2">
			The greatest blog collection in the world. Unfiltered.
		</p>
	</div>

	<div class="flex mx-auto max-w-md gap-6 justify-center my-5">
		{#await getTags()}
			<p class="text-white">Loading Tags...</p>
		{:then response}
			{#each response.tags.slice(0, 5) as tag}
				<Badge text={tag} />
			{/each}
		{/await}
	</div>

	<section class="px-2 mt-16">
		<div class="max-w-2xl mx-auto flex justify-between">
			<h2 class="text-white text-3xl font-medium">Latest</h2>
			<a
				href="/create"
				class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
				>Create</a
			>
		</div>
		<section class="flex flex-col gap-2 my-5">
			{#each $articles as article}
				<Card {article} />
			{/each}
		</section>
		<div class="w-full flex justify-center">
			<button
				class="text-white rounded-md px-4 py-2 bg-blue-500"
				on:click={() => (currentPage += 1)}>Load more</button
			>
		</div>
	</section>
</main>
