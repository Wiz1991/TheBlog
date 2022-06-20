<script>
	import Navbar from '@components/Navbar.svelte';
	import { SvelteToast } from '@zerodevx/svelte-toast';

	import '../app.css';
</script>

<Navbar />
<SvelteToast />

<slot />
