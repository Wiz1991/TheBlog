import { BASE_URL } from '@api/base';
import axios, { type AxiosResponse } from 'axios';

interface TagsCollection {
	tags: string[];
}

export async function getTags(): Promise<TagsCollection> {
	const response = await axios.get(`${BASE_URL}/api/tags`);
	return response.data;
}
