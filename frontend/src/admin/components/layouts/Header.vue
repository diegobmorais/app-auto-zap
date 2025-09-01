<template>
    <header class="flex items-center justify-between bg-white shadow-md p-4 sticky top-0 z-10">
        <div class="flex items-center space-x-4">
            <button @click="toggleSidebar" class="text-green-700 p-2 rounded-lg hover:bg-green-100 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <h1 class="text-xl font-semibold">{{ currentPage }}</h1>
        </div>

        <!-- Perfil -->
        <div class="flex items-center space-x-3">
            <span class="text-green-700 font-medium">{{ userName }}</span>
            <img src="/avatar.png" alt="Avatar" class="w-10 h-10 rounded-full shadow-sm">
        </div>
    </header>
</template>

<script setup>
defineProps({
    title: String,
})

defineEmits(['toggle-sidebar'])
</script>
