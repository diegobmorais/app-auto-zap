<script setup>
import { ref } from 'vue'
import { useAuthStore } from '@/stores/auth'
import { useRouter } from 'vue-router'

const authStore = useAuthStore()
const router = useRouter()

const email = ref('')
const password = ref('')
const loading = ref(false)
const error = ref('')

const submit = async () => {
    loading.value = true
    error.value = ''
    try {
        await authStore.login(email.value, password.value)
        router.push('/dashboard')
    } catch (err) {
        error.value = 'Email ou senha incorretos'
    } finally {
        loading.value = false
    }
}
</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Login</h2>

            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" v-model="email" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
                    <input type="password" v-model="password" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                </div>

                <div v-if="error" class="text-red-500 text-sm">{{ error }}</div>

                <button type="submit" :disabled="loading"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors disabled:opacity-50">
                    {{ loading ? 'Entrando...' : 'Login' }}
                </button>
            </form>
        </div>
    </div>
</template>
