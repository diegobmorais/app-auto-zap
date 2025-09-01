<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-50">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h2 class="text-2xl font-bold mb-6">Login</h2>
            <form @submit.prevent="submitForm">
                <input v-model="form.email" placeholder="Email" class="w-full border p-2 mb-4 rounded" type="email" />
                <input v-model="form.password" placeholder="Senha" class="w-full border p-2 mb-4 rounded"
                    type="password" />
                <button type="submit"
                    class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Entrar</button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { useAuthStore } from '@/stores/auth'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const auth = useAuthStore()
const form = ref({
    email: '',
    password: ''
})

const submitForm = async () => {
    try {
        await auth.login(form.value)          
        if (auth.isAdmin) {
            console.log('admin');
            
            router.push('/admin')
        } else {
            router.push('/client')
        }
    } catch (error) {
        alert('Credenciais inválidas')
    }
}
</script>