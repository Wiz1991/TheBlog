import { BASE_URL } from '@api/base';
import axios, { type AxiosResponse } from 'axios';
import type { User } from 'src/stores/user.store';
export interface LoginRequest {
	email: string;
	password: string;
}

export interface RegisterRequest {
	email: string;
	password: string;
	username: string;
}



export async function login(payload: LoginRequest): Promise<AxiosResponse<User>> {
	axios.defaults.withCredentials = true;
	await axios.get(`${BASE_URL}/sanctum/csrf-cookie`);
	return await axios.post(`${BASE_URL}/api/login`, payload, {
		xsrfHeaderName: 'X-CSRF-TOKEN',
		withCredentials: true
	});
}

export async function register(payload: RegisterRequest): Promise<AxiosResponse<User>> {
	return axios.post(`${BASE_URL}/api/register`, payload);
}
