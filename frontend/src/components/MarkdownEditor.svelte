<script lang="ts">
	import { Result } from 'postcss';
	import snarkdown from 'snarkdown';
	export let markdown = '';
	$: result = snarkdown(markdown);

	let preview_enabled = false;
</script>

<section>
	{#if !preview_enabled}
		<div class="flex flex-col my-6">
			<div class="flex justify-between">
				<label for="content" class="text-white mb-2 font-semibold">Content</label>
				<div class="flex gap-5 my-2">
					<button
						class=" rounded-full text-gray-200 px-3"
						class:bg-blue-500={!preview_enabled}
						class:text-white={!preview_enabled}
						on:click={() => (preview_enabled = false)}
					>
						Edit
					</button>
					<button
						class="text-gray-200 rounded-full px-3"
						class:bg-blue-500={preview_enabled}
						class:text-white={preview_enabled}
						on:click={() => (preview_enabled = true)}>Preview</button
					>
				</div>
			</div>
			<textarea
				name="content"
				class="bg-gray-700 rounded-md h-56 text-white p-5"
				bind:value={markdown}
				required
				placeholder="Write down your blod here. Markdown enabled. "
			/>
		</div>
	{:else}
		<div class="">
			<div class="flex justify-between my-6">
				<span class="text-white mb-2 font-semibold">Preview</span>
				<div class="flex gap-5 my-2">
					<button
						class=" rounded-full text-gray-200 px-3"
						class:bg-blue-500={!preview_enabled}
						class:text-white={!preview_enabled}
						on:click={() => (preview_enabled = false)}
					>
						Edit
					</button>
					<button
						class="text-gray-200 rounded-full px-3"
						class:bg-blue-500={preview_enabled}
						class:text-white={preview_enabled}
						on:click={() => (preview_enabled = true)}>Preview</button
					>
				</div>
			</div>
			<article class="prose lg:prose-xl dark:prose-invert">
				{#if !result.length}
					<p>No content to preview</p>
				{:else}
					{@html result}
				{/if}
			</article>
		</div>
	{/if}
</section>
