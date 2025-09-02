<template>
    <div class="min-h-screen flex items-center justify-center bg-gradient-subtle">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">404</h1>
            <p class="text-xl text-muted-foreground mb-4">Oops! Página não encontrada</p>
            <router-link to="/" class="text-primary hover:text-primary-hover underline font-medium transition-smooth">
                Voltar ao Início
            </router-link>
        </div>
    </div>
</template>

<script setup lang="ts">
import { onMounted } from 'vue'
import { useRoute } from 'vue-router'

const route = useRoute()

onMounted(() => {
    console.error('404 Error: User attempted to access non-existent route:', route.path)
})
</script>