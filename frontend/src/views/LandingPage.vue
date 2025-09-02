<template>
  <div>
    <!-- Navbar -->
    <Header />

    <!-- Hero Section -->
    <main class="flex-grow">
      <Hero />
    </main>

    <!-- Footer -->
    <Footer />
  </div>
</template>

<script setup>
import Hero from '@/components/layouts/Hero.vue'
import Footer from '@/components/layouts/Footer.vue'
import Header from '../components/layouts/Header.vue';
</script>
