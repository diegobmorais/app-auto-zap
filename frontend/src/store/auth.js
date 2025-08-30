import { defineStore } from 'pinia';
import axios from 'axios';
import { ref } from 'vue';

export const useAuthStore = defineStore('auth', () => {
    const user = ref(null)
    const token = ref(null)

    const login = async (email, password) => {
        const res = await axios.post(import.meta.env.VITE_API_URL + '/login', { email, password }, { withCredentials: true })
        token.value = res.data.access_token
        user.value = res.data.user
        axios.defaults.headers.common['Authorization'] = `Bearer ${token.value}`
    }
    const fetchUser = async () => {
        const res = await axios.get(import.meta.env.VITE_API_URL + '/me', { withCredentials: true })
        user.value = res.data
    }
    const logout = async () => {
        await axios.post(import.meta.env.VITE_API_URL + '/logout', {}, { withCredentials: true })
        user.value = null
        token.value = null
        delete axios.defaults.headers.common['Authorization']
    }

    return {
        //state
        user

        //actions
    }
})