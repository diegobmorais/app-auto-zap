<template>
    <aside :class="[
        'bg-card border-r border-border shadow-soft transition-all duration-300',
        isCollapsed ? 'w-23' : 'w-50'
    ]">
        <!-- Logo/Brand -->
        <div class="p-8 py-6">
            <div class="flex items-center justify-between gap-4">
                <!-- Logo + Títulos -->
                <div class="flex items-center gap-3">
                    <!-- Logo -->
                    <div class="w-8 h-8 bg-gradient-primary rounded-lg flex items-center justify-center">
                        <span class="text-primary-foreground font-bold text-sm">A</span>
                    </div>
                    <!-- Títulos -->
                    <div v-if="!isCollapsed" class="transition-opacity duration-200">
                        <h2 class="font-bold text-lg bg-gradient-primary bg-clip-text text-transparent">Admin</h2>
                        <p class="text-xs text-muted-foreground">Painel de Controle</p>
                    </div>
                </div>

                <!-- Botão de recolher -->
                <button @click="$emit('toggle')"
                    class="flex items-center justify-center w-10 h-8 bg-muted hover:bg-primary/20 rounded-full shadow-md transition-all z-10 duration-300 group">
                    <ChevronLeft :class="[
                        'w-4 h-4 transition-transform duration-300',
                        isCollapsed ? 'rotate-180' : ''
                    ]" />
                </button>
            </div>
        </div>


        <!-- Navigation Menu -->
        <nav class="p-4 space-y-2">
            <router-link v-for="item in menuItems" :key="item.route" :to="item.route" :class="[
                'flex items-center gap-3 px-3 py-3 rounded-lg transition-smooth group',
                'hover:bg-muted/50 hover:shadow-soft',
                $route.route === item.route ? 'bg-primary/10 text-primary border border-primary/20 shadow-elegant' : ''
            ]">
                <component :is="item.icon"
                    :class="['w-5 h-5', $route.route === item.route ? 'text-primary' : 'text-muted-foreground group-hover:text-foreground']" />
                <span v-if="!isCollapsed"
                    :class="['font-medium transition-smooth', $route.route === item.route ? 'text-primary' : 'group-hover:text-foreground']">
                    {{ item.name }}
                </span>
            </router-link>
        </nav>
    </aside>
</template>

<script setup>
import {
    LayoutDashboard,
    Users,
    Package,
    ShoppingCart,
    Settings,
    ChevronLeft
} from 'lucide-vue-next'

defineProps({ isCollapsed: Boolean })
const emit = defineEmits(['toggle'])

const menuItems = [
    { name: 'Dashboard', icon: LayoutDashboard, route: '/admin' },
    { name: 'Clientes', icon: Users, route: '/admin/customers' },
    { name: 'Pedidos', icon: Package, route: '/admin/orders' },
    { name: 'Planos', icon: ShoppingCart, route: '/admin/plans' },
    { name: 'Configurações', icon: Settings, route: '/admin/settings' },
    { name: 'CSM Panel', icon: ChevronLeft, route: '/admin/csm' },
]
</script>

<style scoped>
/* Efeito de sombra ao passar o mouse */
a:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}
</style>
