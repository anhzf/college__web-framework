import axios from 'axios';

const http = axios.create({
  baseURL: import.meta.env.API_URL,
});

export default http;
