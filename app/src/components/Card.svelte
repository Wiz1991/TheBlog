<script>
	export let description = '';
	export let title = '';
	let tags = ['Tech', 'Javascript'];
</script>

<div
	class="max-w-2xl px-5 py-4 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-700"
	style="cursor: auto;"
>
	<div class="flex items-center justify-between">
		<span class="text-sm font-light text-gray-600 dark:text-gray-400">Jan 15, 2022</span>
		<ul class="flex gap-2">
			{#each tags as tag}
				<li>
					<a
						href="#_"
						class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform bg-gray-600 rounded cursor-pointer hover:bg-gray-500"
						>tag</a
					>
				</li>
			{/each}
		</ul>
	</div>
	<div class="mt-1">
		<a
			href="https://stackdiary.com/"
			class=" font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline text-xl"
			>{title}</a
		>
		<p class="mt-2 text-gray-600 dark:text-gray-300 text-sm line-clamp-3">
			{description}
		</p>
	</div>
	<div class="flex items-center justify-between mt-4">
		<a href="#_" class="text-blue-600 dark:text-blue-400 hover:underline">Read more ⟶</a>
		<div class="flex items-center">
			<span class="dark:text-gray-400 text-sm mx-2 font-bold">Author: </span>
			<a href="#_" class="font-bold text-gray-700 cursor-pointer dark:text-gray-200 text-sm"
				>John Doe</a
			>
		</div>
	</div>
</div>
