import axios from 'axios';

export const FETCH_SERIES = 'FETCH_SERIES';

const ROOT_URL = '/api/v1';

// get all posts
export function fetchSeries() {

	const request = axios.get(`${ROOT_URL}/bmw/series`);

	return {
		type: FETCH_SERIES,
		payload: request
	}; 
}
