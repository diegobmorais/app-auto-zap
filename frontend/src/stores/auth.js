import { defineStore } from 'pinia';
import api from '@/services/api'
import { ref } from 'vue';

export const useAuthStore = defineStore('auth', () => {
    const user = ref(null)
    const token = ref(null)

    const login = async (email, password) => {
        const response = await api.post('/login', { email, password })
        token.value = response.data.access_token
        user.value = response.data.user
        api.defaults.headers.common['Authorization'] = `Bearer ${token.value}`
    }

    const fetchUser = async () => {
        const response = await api.get('/me')
        user.value = response.data
    }

    const logout = async () => {
        await api.post('/logout', {})
        user.value = null
        token.value = null
    }

    return {
        //state
        user,

        //actions
        login,
        fetchUser,
        logout,
    }
})