import { defineStore } from 'pinia';
import { computed, ref } from 'vue';
import { api, getCsrfCookie } from '@/services/api';

export const useAuthStore = defineStore('auth', () => {
    const user = ref(null)
    const initialized = ref(false)

    const init = async () => {
        if (initialized.value) return;

        await getCsrfCookie();

        try {
            const { data } = await api.get('/api/me');
            user.value= data;
        } catch {
            user.value= null;
        } finally {
            initialized.value = true;
        }
    }

    const login = async (credentials) => {
        await getCsrfCookie();

        const response = await api.post('api/login', credentials)     
        user.value = response.data.user

        return response
    }  

    const isAdmin = computed(() => {
        if (!user.value?.roles) return false
        return user.value.roles.some(role => role.name === 'super-admin')
    })

    const logout = async () => {
        await api.post('/logout', {})
        user.value = null     
    }

    return {
        //state
        user,
        initialized,

        //getters
        isAdmin,

        //actions
        init,
        login,
        logout,
    }
})