import { ref } from 'vue'
import { defineStore } from 'pinia'
import { api } from '../../services/api'

export const useCmsStore = defineStore('cms', () => {

    const banner = ref({
        title: '',
        subtitle: '',
        image: ''
    })

    const loading = ref(false)

    const fetchBanner = async () => {
        loading.value = true
        try {
            const res = await api.get('/api/cms/banner')
            banner.value = res.data   
            
        } catch (error) {
            console.error('Erro ao carregar banner:', error)
        } finally {
            loading.value = false
        }
    }

    return {
        //states
        banner,
        loading,

        //actions
        fetchBanner
    }
})
