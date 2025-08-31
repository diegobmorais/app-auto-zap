import axios from 'axios'

const api = axios.create({
    baseURL: import.meta.env.VITE_API_URL, 
    withCredentials: true,                 
    headers: {
        'Accept': 'application/json'
    }
})

import { useAuthStore } from '@/stores/auth'
api.interceptors.request.use(config => {
    const auth = useAuthStore()
    if (auth.token) {
        config.headers.Authorization = `Bearer ${auth.token}`
    }
    return config
}, error => {
    return Promise.reject(error)
})

export default api
