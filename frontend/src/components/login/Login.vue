<template>
    <form @submit.prevent="loginUser">
        <input v-model="email" placeholder="Email">
        <input type="password" v-model="password" placeholder="Senha">
        <button type="submit">Login</button>
    </form>
</template>

<script setup>
import { ref } from 'vue'
import { useAuthStore } from '@/stores/auth'

const auth = useAuthStore()
const email = ref('')
const password = ref('')

const loginUser = async () => {
    try {
        await auth.login(email.value, password.value)
        alert('Logado com sucesso!')
    } catch (err) {
        alert('Erro ao logar')
    }
}
</script>
