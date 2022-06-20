import type { Article } from '@api/article';
import { writable } from 'svelte/store';

function createArticlesStore() {
	const { subscribe, set, update } = writable<Article[]>([]);

	const add = (article: Article) => {
		update((articles) => [...articles, article]);
	};

	const append = (newArticles: Article[]) => {
		update((old) => [...old, ...newArticles]);
	};

	const remove = (slug: string) => {
		update((articles) => articles.filter((article) => article.slug !== slug));
	};
	const reset = () => {
		set([]);
	};

	return {
		subscribe,
		add,
		remove,
		append,
		reset
	};
}

export const articles = createArticlesStore();
