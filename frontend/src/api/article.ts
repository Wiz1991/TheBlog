import { BASE_URL } from '@api/base';
import axios, { type AxiosResponse } from 'axios';
import { user } from '../stores/user';
export interface Article {
	slug: string;
	title: string;
	body: string;
	createdAt: string;
	updatedAt: string;
	tagList: string[];
	author: {
		username: string;
	};
}

export interface ArticleCollection {
	articles: Article[];
	total: number;
}

export interface CreateArticleRequest {
	title: string;
	body: string;
	tagList: string[];
}

export function getArticles(
	page: number,
	limit: number = 5,
	tag?: string
): Promise<AxiosResponse<ArticleCollection>> {
	return axios.get(
		`${BASE_URL}/api/articles?limit=${limit}&offset=${page}` + (tag ? `&tag=${tag}` : '')
	);
}

export function getArticle(slug: string): Promise<AxiosResponse<Article>> {
	return axios.get(`${BASE_URL}/api/articles/${slug}`);
}

export function createArticle(
	payload: CreateArticleRequest,
	token: string
): Promise<AxiosResponse<Article>> {
	return axios.post(
		`${BASE_URL}/api/articles`,
		{ article: payload },
		{
			headers: {
				Authorization: `Bearer ${token}`
			}
		}
	);
}

export function deleteArticle(slug: string, token: string) {
	return axios.delete(`${BASE_URL}/api/articles/${slug}`, {
		headers: {
			Authorization: `Bearer ${token}`
		}
	});
}
