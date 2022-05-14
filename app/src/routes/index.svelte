<script>
	import Badge from '@components/Badge.svelte';
	import Card from '@components/Card.svelte';
	import Hero from '@components/Hero.svelte';
	import { text } from 'svelte/internal';
</script>

<Hero />

<main class="container max-w-6xl mx-auto mt-20 mb-52">
	<list class="flex mx-auto max-w-md gap-6 justify-center my-5">
		<Badge text="Tech" />
		<Badge text="Tech" />
		<Badge text="Tech" />
		<Badge text="Tech" />
	</list>
	<Card
		description="Dui urna vehicula tincidunt pretium consequat luctus mi, platea fermentum conubia tempus ac orci. Pellentesque dictum malesuada cubilia faucibus dignissim mi nascetur senectus, augue ad libero efficitur dolor duis lobortis, non etiam sociosqu."
		title="Lorem ipsum dolor sit amet"
	/>
</main>
