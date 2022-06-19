<script>
	import Badge from '@components/Badge.svelte';
	import Card from '@components/Card.svelte';
	import Hero from '@components/Hero.svelte';
	import { text } from 'svelte/internal';
</script>

<Hero />

<main class="container max-w-6xl mx-auto mt-20 mb-52">
	<h1 class="text-center text-6xl text-white font-bold mb-20 tracking-wider ">The Blog</h1>
	<div class="flex mx-auto max-w-md gap-6 justify-center my-5">
		<Badge text="Tech" />
		<Badge text="Tech" />
		<Badge text="Tech" />
		<Badge text="Tech" />
	</div>

	<section class="px-2 mt-16">
		<div class="max-w-2xl mx-auto flex justify-between">
			<h2 class="text-white text-3xl font-medium">Latest</h2>
			<button
				class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
				>Create</button
			>
		</div>
		<div class="flex flex-col gap-7 mt-12">
			<Card
				description="Dui urna vehicula tincidunt pretium consequat luctus mi, platea fermentum conubia tempus ac orci. Pellentesque dictum malesuada cubilia faucibus dignissim mi nascetur senectus, augue ad libero efficitur dolor duis lobortis, non etiam sociosqu."
				title="Lorem ipsum dolor sit amet"
			/>
			<Card
				description="Dui urna vehicula tincidunt pretium consequat luctus mi, platea fermentum conubia tempus ac orci. Pellentesque dictum malesuada cubilia faucibus dignissim mi nascetur senectus, augue ad libero efficitur dolor duis lobortis, non etiam sociosqu."
				title="Lorem ipsum dolor sit amet"
			/>
			<Card
				description="Dui urna vehicula tincidunt pretium consequat luctus mi, platea fermentum conubia tempus ac orci. Pellentesque dictum malesuada cubilia faucibus dignissim mi nascetur senectus, augue ad libero efficitur dolor duis lobortis, non etiam sociosqu."
				title="Lorem ipsum dolor sit amet"
			/>
		</div>
	</section>
</main>
