import { writable } from 'svelte/store';

export interface User {
	username: string;
	token: string;
}

function createUserStore() {
	const { subscribe, set, update } = writable<User | null>(null);

	const login = (user: User) => {
		set(user);
	};

	const logout = () => {
		set(null);
	};

	return {
		subscribe,
		login,
		logout
	};
}

export const user = createUserStore();
