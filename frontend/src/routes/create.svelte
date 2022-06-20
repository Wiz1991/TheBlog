<script lang="ts">
	import { createArticle, type CreateArticleRequest } from '@api/article';
	import { goto } from '$app/navigation';
	import MarkdownEditor from '@components/MarkdownEditor.svelte';
	import { user } from '../stores/user';

	let article: CreateArticleRequest = { title: '', body: '', tagList: [] };

	let tag_creation = '';

	const onSubmit = async () => {
		const token = $user?.token!;

		article.tagList.push(tag_creation);

		await createArticle(article, token);
		goto('/');
	};
</script>

<main class="container mt-20 mb-52 px-3 max-w-3xl mx-auto">
	<h1 class="text-white  text-3xl font-medium">Create Blog</h1>

	<form
		class="my-10"
		on:submit={(e) => {
			e.preventDefault();
			onSubmit();
		}}
	>
		<label for="title" class="block mb-2 text-sm  text-white font-semibold">Title</label>
		<input
			type="text"
			id="title"
			class="bg-gray-50 border md:max-w-sm border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
			placeholder="John"
			bind:value={article.title}
			required
		/>

		<label for="tag" class="block mb-2 text-sm my-4  text-white font-semibold">Tag</label>
		<input
			type="text"
			name="tag"
			id="genre"
			class="bg-gray-50 border md:max-w-sm border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
			placeholder="Tech"
			bind:value={tag_creation}
		/>

		<MarkdownEditor bind:markdown={article.body} />

		<div class="w-full flex justify-end">
			<button type="submit" class="text-white bg-blue-500 rounded-lg px-6 py-2">Create</button>
		</div>
	</form>
</main>
