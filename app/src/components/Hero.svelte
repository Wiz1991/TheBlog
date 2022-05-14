<script>
	import BlobScene from './BlobScene.svelte';
</script>

<BlobScene />
<section class="container max-w-lg px-4 py-32 mx-auto text-left md:max-w-none md:text-center">
	<h1
		class="text-5xl font-extrabold leading-10 tracking-tight text-left text-gray-900 md:text-center sm:leading-none md:text-6xl lg:text-7xl select-none"
	>
		<span class="inline md:block"> Start Writing Your</span>
		<span
			class="relative mt-2 text-transparent bg-clip-text bg-gradient-to-br from-indigo-600 to-indigo-500 md:inline-block"
			>Next Great Story</span
		>
	</h1>
	<description
		class="mx-auto mt-5 block text-gray-500 md:mt-12 md:max-w-lg md:text-center lg:text-lg select-none"
	>
		Providing everyone with a chance to share their story with others. For the incredible price of
		nothing!
	</description>
	<div class="flex flex-col items-center mt-12 text-center">
		<span class="relative inline-flex w-full md:w-auto">
			<a
				href="#_"
				class="inline-flex select-none items-center justify-center w-full px-8 py-4 text-base font-bold leading-6 text-white bg-indigo-600 border border-transparent rounded-full md:w-auto hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600"
			>
				Get Started
			</a>
			<span
				class="absolute top-0 right-5 px-2 py-1 -mt-3 -mr-6 text-xs font-medium leading-tight text-white bg-green-400 rounded-full"
				>FREE</span
			>
		</span>
	</div>
</section>
