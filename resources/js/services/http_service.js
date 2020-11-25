import axios from 'axios';
import store from '../store.js';

export function http() {
    return axios.create({
        baseURL: 'http://localhost:8000/api',
        headers: {
            'Authorization': 'Bearer '+ localStorage.getItem('token')
        }
    });
}

export function httpFile() {
    return axios.create({
        baseURL: store.state.apiURL,
        headers: {
            'Authorization': 'Bearer '+ localStorage.getItem('token'),
            'Content-Type' : 'multipart/form-data'
        }
    })
}
