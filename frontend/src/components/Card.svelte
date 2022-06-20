<script lang="ts">
	import { deleteArticle, type Article } from '@api/article';
	import { user } from '../stores/user';
	import FaTrash from 'svelte-icons/fa/FaTrash.svelte';
	import { articles } from '../stores/articles';
	import { toast } from '@zerodevx/svelte-toast';
	export let article: Article;

	const ondelete = async () => {
		await deleteArticle(article.slug, $user?.token ?? '');
		articles.remove(article.slug);
		toast.push('Article deleted');
	};
</script>

<div
	class="max-w-2xl w-full px-5 py-4 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800"
	style="cursor: auto;"
>
	<div class="flex items-center justify-between">
		<span class="text-sm font-light text-gray-600 dark:text-gray-400">Jan 15, 2022</span>
		<div class="flex gap-4 items-center">
			<ul class="flex gap-2">
				{#each article.tagList as tag}
					<li
						class="px-4 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform bg-gray-600 rounded cursor-pointer hover:bg-gray-500"
					>
						{tag}
					</li>
				{/each}
			</ul>
			{#if article.author.username === $user?.username}
				<button class="w-4 h-4 text-red-500 hover:text-red-700" on:click={ondelete}
					><FaTrash /></button
				>
			{/if}
		</div>
	</div>
	<div class="mt-1">
		<a
			href={`/articles/${article.slug}`}
			class=" font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline text-xl"
			>{article.title}</a
		>
		<p class="mt-2 text-gray-600 dark:text-gray-300 text-sm line-clamp-3">
			{article.body}
		</p>
	</div>
	<div class="flex items-center justify-between mt-4">
		<a href={`/articles/${article.slug}`} class="text-blue-600 dark:text-blue-400 hover:underline"
			>Read more ⟶</a
		>
		<div class="flex items-center">
			<span class="dark:text-gray-400 text-sm mx-2 font-bold">Author: </span>
			<span class="font-bold text-gray-700  dark:text-gray-200 text-sm"
				>{article.author.username}</span
			>
		</div>
	</div>
</div>
