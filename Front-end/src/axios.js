import axios from 'axios';
// import Cookies from "js-cookie";

axios.defaults.withCredentials = true
// axios.defaults.headers.common['Authorization'] = `Bearer ${Cookies.get('XSRF-TOKEN')}`
axios.defaults.baseURL = 'http://localhost:8000/'

