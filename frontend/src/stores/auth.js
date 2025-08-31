import { defineStore } from 'pinia';
import api from '@/services/api'
import { computed, ref } from 'vue';

export const useAuthStore = defineStore('auth', () => {
    const user = ref(null)
    const token = ref(null)

    const login = async (payload) => {
        const { email, password } = payload

        const response = await api.post('/login', { email, password })
        token.value = response.data.access_token
        user.value = response.data.user
        api.defaults.headers.common['Authorization'] = `Bearer ${token.value}`
    }

    const userIsAdmin = computed(() => {
        if (!user.value?.roles) return false
        return user.value.roles.some(role => role.name === 'super-admin')
    })

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

        //getters
        userIsAdmin,

        //actions
        login,
        fetchUser,
        logout,
    }
})