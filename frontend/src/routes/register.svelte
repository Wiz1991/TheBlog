<script lang="ts">
	import { register, type RegisterRequest } from '@api/auth';
	import { user } from '../stores/user';
	import { goto } from '$app/navigation';

	let formData: RegisterRequest = {
		email: '',
		password: '',
		username: ''
	};

	const onSubmit = async () => {
		const userData = await register(formData);
		user.login(userData.data);
		goto('/');
	};
</script>

<main class="container mt-20 mb-52 px-3 max-w-xl mx-auto">
	<h1 class="text-white  text-4xl font-bold text-center my-10">Sign Up</h1>

	<form
		on:submit={(e) => {
			e.preventDefault();
			onSubmit();
		}}
	>
		<div class="mb-6">
			<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
				>Email</label
			>
			<input
				type="email"
				id="email"
				class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
				placeholder="name@example.com"
				required
				bind:value={formData.email}
			/>
		</div>
		<div class="mb-6">
			<label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
				>Username</label
			>
			<input
				type="text"
				id="username"
				class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
				placeholder="John Doe"
				required
				bind:value={formData.username}
			/>
		</div>
		<div class="mb-6">
			<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
				>Password</label
			>
			<input
				type="password"
				id="password"
				class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
				required
				bind:value={formData.password}
			/>
		</div>

		<button
			type="submit"
			class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
			>Submit</button
		>
	</form>
</main>
