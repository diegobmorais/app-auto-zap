<template>
  <section class="relative overflow-hidden bg-gradient-hero py-20 lg:py-32">
    <div class="container mx-auto px-4">
      <div class="grid lg:grid-cols-2 gap-12 items-center">
        <!-- Conteúdo -->
        <div class="text-center lg:text-left animate-fade-in">
          <!-- Badge -->
          <div
            class="inline-flex items-center rounded-full bg-white/20 px-4 py-2 text-sm font-medium text-primary-foreground backdrop-blur-sm mb-6">
            <Bot class="mr-2 h-4 w-4" />
            Automação Inteligente de WhatsApp
          </div>

          <!-- Título -->
          <h1 class="text-4xl lg:text-6xl font-bold text-primary-foreground mb-6 leading-tight">
            Transforme seu
            <span class="block text-white">WhatsApp em um</span>
            <span class="block bg-gradient-to-r from-white to-primary-foreground bg-clip-text text-transparent">
              Help Desk Automático
            </span>
          </h1>

          <!-- Descrição -->
          <p class="text-lg lg:text-xl text-primary-foreground/90 mb-8 max-w-2xl mx-auto lg:mx-0">
            Atenda seus clientes 24/7 com nossa plataforma de automação inteligente.
            Reduza custos, aumente a satisfação e escale seu negócio com chatbots avançados.
          </p>

          <!-- CTAs -->
          <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-12">
            <button
              class="bg-white text-primary hover:bg-white/90 font-semibold shadow-strong group px-6 py-3 rounded-md flex items-center justify-center">
              Comece Agora Grátis
              <ArrowRight class="ml-2 h-5 w-5 transition-transform group-hover:translate-x-1" />
            </button>
            <button
              class="border border-white/30 text-primary-foreground hover:bg-white/10 backdrop-blur-sm px-6 py-3 rounded-md flex items-center justify-center">
              Ver Demonstração
            </button>
          </div>

          <!-- Stats -->
          <div class="grid grid-cols-3 gap-8 text-center lg:text-left">
            <div>
              <div class="flex items-center justify-center lg:justify-start mb-2">
                <MessageSquare class="h-5 w-5 text-white mr-2" />
                <span class="text-2xl font-bold text-white">98%</span>
              </div>
              <p class="text-sm text-primary-foreground/80">Taxa de Resposta</p>
            </div>
            <div>
              <div class="flex items-center justify-center lg:justify-start mb-2">
                <Zap class="h-5 w-5 text-white mr-2" />
                <span class="text-2xl font-bold text-white">24/7</span>
              </div>
              <p class="text-sm text-primary-foreground/80">Atendimento</p>
            </div>
            <div>
              <div class="flex items-center justify-center lg:justify-start mb-2">
                <Bot class="h-5 w-5 text-white mr-2" />
                <span class="text-2xl font-bold text-white">-70%</span>
              </div>
              <p class="text-sm text-primary-foreground/80">Custos</p>
            </div>
          </div>
        </div>

        <!-- Imagem -->
        <div class="relative animate-slide-up">
          <div class="relative">
            <img :src="heroImage" alt="WhatsApp Automation Dashboard" class="w-full h-auto rounded-2xl shadow-strong" />
            <div
              class="absolute -top-4 -right-4 w-24 h-24 bg-white/20 rounded-full animate-pulse-gentle backdrop-blur-sm flex items-center justify-center">
              <Bot class="h-12 w-12 text-white animate-bounce-gentle" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Background -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
      <div class="absolute top-20 left-10 w-72 h-72 bg-white/5 rounded-full blur-3xl"></div>
      <div class="absolute bottom-20 right-10 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>
    </div>
  </section>
</template>

<script setup>
// import heroImage from '@/assets/hero-whatsapp-automation.jpg';
import { ArrowRight, Bot, Zap, MessageSquare } from 'lucide-vue-next';
</script>
