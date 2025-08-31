<template>
  <section class="bg-gradient-to-r from-green-50 to-emerald-100 py-20 w-full">
    <div class="container mx-auto px-4 text-center" v-if="banner">
      <h1 class="text-4xl font-bold text-gray-800 mb-4">
        {{ banner.title }}
      </h1>
      <p class="text-xl text-gray-600 mb-8">
        {{ banner.subtitle }}
      </p>
      <CmsImage v-if="banner.image" :src="banner.image"
        class="mx-auto mb-8 max-w-lg rounded-lg shadow" />
      <router-link to="/login"
        class="bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 inline-block">
        Comece Agora
      </router-link>
    </div>

    <!-- Loading -->
    <div v-else class="text-center py-20">
      <p class="text-gray-500 text-lg animate-pulse">Carregando...</p>
    </div>
  </section>
</template>

<script setup>
import CmsImage from '@/components/CmsImage.vue'
import { onMounted } from 'vue'
import { useCmsStore } from '@/stores/admin/cms'

const { banner, loading, fetchBanner } = useCmsStore()

onMounted(fetchBanner)
</script>
