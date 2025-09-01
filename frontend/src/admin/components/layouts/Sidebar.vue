<template>
    <aside
        class="fixed inset-y-0 left-0 z-50 w-64 bg-green-700 shadow-lg rounded-tr-xl rounded-br-xl transform transition-transform duration-300 ease-in-out"
        :class="[isOpen ? 'translate-x-0' : '-translate-x-full']">
        <!-- Logo -->
        <div
            class="flex items-center justify-center h-20 bg-green-800 border-b border-green-600 rounded-tr-xl shadow-md">
            <h1 class="text-2xl font-bold text-green-50 tracking-wider">AutoWhatsApp</h1>
        </div>

        <!-- Menu -->
        <nav class="mt-6 px-4">
            <ul class="space-y-3">
                <li v-for="item in menuItems" :key="item.name" class="group relative">
                    <router-link :to="item.route"
                        class="flex items-center space-x-3 p-3 rounded-lg hover:bg-green-600 transition-all duration-200 shadow-sm group-hover:translate-x-1">
                        <i class="w-5 h-5 text-green-50">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor"></svg>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="{
                                users: 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z',
                                'shopping-bag': 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z',
                                'credit-card': 'M3 10h18M7 15h10M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                                settings: 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z',
                                'message-circle': 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z'
                            }[item.icon]" />
                        </i>
                        <span class="font-medium text-green-50">{{ item.name }}</span>

                        <!-- Tooltip -->
                        <span
                            class="absolute left-full ml-2 px-2 py-1 bg-green-800 text-green-50 rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-sm whitespace-nowrap shadow-lg">
                            {{ item.name }}
                        </span>
                    </router-link>
                </li>
            </ul>
        </nav>
    </aside>
</template>

<script setup>
defineProps({ isOpen: Boolean })
const emit = defineEmits(['toggle'])

const menuItems = [
    { name: 'Dashboard', icon: 'houses', route: '/admin' },
    { name: 'Clientes', icon: 'users', route: '/admin/customers' },
    { name: 'Pedidos', icon: 'shopping-bag', route: '/admin/orders' },
    { name: 'Planos', icon: 'credit-card', route: '/admin/plans' },
    { name: 'Configurações', icon: 'settings', route: '/admin/settings' },
    { name: 'CSM Panel', icon: 'message-circle', route: '/admin/csm' },
]
</script>

<style scoped>
/* Efeito de sombra ao passar o mouse */
a:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}
</style>
