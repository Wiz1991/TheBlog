<script lang="ts">
	import { onMount } from 'svelte';
	import { scale } from 'svelte/transition';
	import FaChevronDown from 'svelte-icons/fa/FaChevronDown.svelte';
	import FaChevronUp from 'svelte-icons/fa/FaChevronUp.svelte';
	import { user } from '../stores/user.store';

	let show = false; // menu state
	let menu: HTMLDivElement | null = null; // menu wrapper DOM reference

	onMount(() => {
		const handleOutsideClick = (event: any) => {
			if (show && !menu?.contains(event.target)) {
				show = false;
			}
		};

		const handleEscape = (event: { key: string }) => {
			if (show && event.key === 'Escape') {
				show = false;
			}
		};

		// add events when element is added to the DOM
		document.addEventListener('click', handleOutsideClick, false);
		document.addEventListener('keyup', handleEscape, false);

		// remove events when element is removed from the DOM
		return () => {
			document.removeEventListener('click', handleOutsideClick, false);
			document.removeEventListener('keyup', handleEscape, false);
		};
	});
</script>

<div class="relative" bind:this={menu}>
	<div>
		<button
			on:click={() => (show = !show)}
			class="menu focus:outline-none focus:shadow-solid flex items-center"
		>
			<img
				class="w-8 h-8 mx-1 rounded-full"
				src="https://picsum.photos/seed/${$user?.username}/50/50"
				alt={'avatar'}
			/>
			{#if show}
				<div class="w-4 h-4 text-gray-300">
					<FaChevronUp />
				</div>
			{:else}
				<div class="w-4 h-4 text-gray-300">
					<FaChevronDown class="w-6 h-6 text-gray-600" />
				</div>
			{/if}
		</button>

		{#if show}
			<div
				in:scale={{ duration: 100, start: 0.95 }}
				out:scale={{ duration: 75, start: 0.95 }}
				class="origin-top-right absolute right-0 w-48 py-2 mt-1 bg-gray-800
            rounded shadow-xl"
			>
				<a
					href="/api/logout"
					on:click={user.logout}
					class="block px-4 py-2 hover:bg-gray-700 hover:text-gray-100 text-white">Logout</a
				>
			</div>
		{/if}
	</div>
</div>
