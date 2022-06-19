<script lang="ts">
	import Dropdown from './Dropdown.svelte';
	import { scale } from 'svelte/transition';
	import FaBars from 'svelte-icons/fa/FaBars.svelte';
	import { page } from '$app/stores';
	import { user } from '../stores/user.store';
	let expanded = false;

	$: currentPage = $page.url.pathname;

	const pages = [
		{ path: '/', name: 'Home' },
		{ path: '/create', name: 'Create' }
	];

	console.log(user);
</script>

<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800">
	<div class="container flex flex-wrap justify-between items-center mx-auto max-w-2xl">
		<a href="/" class="flex items-center px-2">
			<span class="self-center text-2xl font-extrabold whitespace-nowrap  dark:text-white"
				>TheBlog</span
			>
		</a>
		<div class="flex items-center md:order-2 pr-2">
			{#if $user}
				<Dropdown />
			{:else}
				<a href="/login" class="text-white bg-blue-500 px-4 rounded-lg py-1 font-medium">Sign In</a>
			{/if}
			<button
				data-collapse-toggle="mobile-menu-2"
				type="button"
				class="inline-flex w-10 items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
				on:click={() => (expanded = !expanded)}
				aria-controls="mobile-menu-2"
				aria-expanded="false"
			>
				<span class="sr-only">Open main menu</span>
				<FaBars />
			</button>
		</div>
		<div
			class="origin-top-right justify-between items-center w-full md:flex md:w-auto md:order-1"
			class:hidden={!expanded}
			in:scale={{ duration: 100, start: 0.95 }}
			out:scale={{ duration: 75, start: 0.95 }}
			id="mobile-menu-2"
		>
			<ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
				{#each pages as page}
					<li>
						<a
							href={page.path}
							class="block py-2 pr-4 pl-3  rounded md:bg-transparent md:p-0 hover:text-white"
							class:text-white={currentPage === page.path}
							class:text-gray-400={currentPage !== page.path}
							aria-current="page"
						>
							{page.name}
						</a>
					</li>
				{/each}
			</ul>
		</div>
	</div>
</nav>
