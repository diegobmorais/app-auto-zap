<script setup>
import { useAuthStore } from '@/stores/auth'
import { useRouter } from 'vue-router'

const auth = useAuthStore()
const router = useRouter()

const logout = async () => {
    await auth.logout()
    router.push('/')
}
</script>

<template>
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-blue-600 text-white p-4 flex justify-between items-center">
            <h1 class="font-bold text-lg">AppAutoZap Dashboard</h1>
            <button @click="logout" class="bg-white text-blue-600 px-3 py-1 rounded hover:bg-gray-100">
                Logout
            </button>
        </nav>

        <!-- Conteúdo principal -->
        <main class="flex-1 p-6 bg-gray-100">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h2 class="text-lg font-bold mb-2">Usuários</h2>
                    <p>Exemplo de informação sobre usuários.</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h2 class="text-lg font-bold mb-2">Empresas</h2>
                    <p>Exemplo de informação sobre empresas.</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h2 class="text-lg font-bold mb-2">Mensagens</h2>
                    <p>Exemplo de notificações ou mensagens automáticas.</p>
                </div>
            </div>
        </main>
    </div>
</template>
