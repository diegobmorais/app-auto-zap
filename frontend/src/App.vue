<template>
    <div class="flex h-screen bg-green-50 font-sans text-gray-900">
        <!-- Sidebar -->
        <Sidebar :is-open="sidebarOpen" @toggle="toggleSidebar" />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col transition-all duration-300">
            <!-- Header -->
            <Header />

            <!-- Conteúdo principal -->
            <main class="flex-1 p-6 overflow-y-auto grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                <RouterView />
            </main>

            <Footer />
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import Sidebar from '@/admin/components/layouts/Sidebar.vue'
import Header from '@/admin/components/layouts/Header.vue'
import Footer from '@/admin/components/layouts/Footer.vue'

import { useAuthStore } from '@/stores/auth'

const sidebarOpen = ref(true)
const toggleSidebar = () => sidebarOpen.value = !sidebarOpen.value

const currentPage = ref('Dashboard')
const auth = useAuthStore()
const userName = auth.user?.name || 'Usuário'
</script>

<style scoped>
/* Scroll suave e elegante */
main::-webkit-scrollbar {
    width: 8px;
}

main::-webkit-scrollbar-thumb {
    background-color: #b7d5ac;
    border-radius: 4px;
}

main::-webkit-scrollbar-track {
    background: #e6f0dc;
}
</style>
