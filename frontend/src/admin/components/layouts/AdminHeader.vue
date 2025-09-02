<template>
    <header class="h-16 bg-card border-b border-border shadow-soft px-6 flex items-center justify-between">
        <!-- Left side -->
        <div class="flex items-center gap-4">
            <button @click="$emit('toggle-sidebar')" class="lg:hidden p-2 hover:bg-muted rounded-lg transition-smooth">
                <Menu class="w-5 h-5" />
            </button>

            <div>
                <h1 class="text-lg font-semibold">{{ currentPageTitle }}</h1>
                <p class="text-sm text-muted-foreground">{{ getCurrentTime() }}</p>
            </div>
        </div>

        <!-- Right side -->
        <div class="flex items-center gap-4">
            <!-- Notifications -->
            <button class="relative p-2 hover:bg-muted rounded-lg transition-smooth">
                <Bell class="w-5 h-5" />
                <span class="absolute -top-1 -right-1 w-3 h-3 bg-primary rounded-full flex items-center justify-center">
                    <span class="w-1.5 h-1.5 bg-primary-foreground rounded-full"></span>
                </span>
            </button>

            <!-- Search -->
            <div class="hidden md:flex items-center relative">
                <Search class="w-4 h-4 absolute left-3 text-muted-foreground" />
                <input type="text" placeholder="Buscar..."
                    class="pl-10 pr-4 py-2 bg-muted rounded-lg text-sm border-0 focus:ring-2 focus:ring-primary/20 transition-smooth" />
            </div>

            <!-- Profile -->
            <div class="flex items-center gap-3">
                <div class="hidden sm:block text-right">
                    <p class="text-sm font-medium">Admin</p>
                    <p class="text-xs text-muted-foreground">Administrador</p>
                </div>
                <div class="w-10 h-10 bg-gradient-primary rounded-full flex items-center justify-center">
                    <User class="w-5 h-5 text-primary-foreground" />
                </div>
            </div>
        </div>
    </header>
</template>

<script setup lang="ts">
import { computed } from 'vue'
import { useRoute } from 'vue-router'
// import { Menu, Bell, Search, User } from 'lucide-vue-next'

defineEmits < {
    'toggle-sidebar': []
} > ()

const route = useRoute()

const currentPageTitle = computed(() => {
    const titles: Record<string, string> = {
        '/': 'Dashboard',
        '/clientes': 'Clientes',
        '/planos': 'Planos',
        '/pedidos': 'Pedidos',
        '/configuracoes': 'Configurações'
    }
    return titles[route.path] || 'Admin'
})

const getCurrentTime = () => {
    return new Date().toLocaleString('pt-BR', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    })
}
</script>