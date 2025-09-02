<template>
  <div class="min-h-screen flex flex-col">
    <Header />

    <main class="flex-1">
      <!-- Hero Section -->
      <section class="bg-gradient-hero py-20">
        <div class="container mx-auto px-4">
          <div class="max-w-4xl mx-auto text-center animate-fade-in">
            <h1 class="text-4xl lg:text-5xl font-bold text-primary-foreground mb-6">
              Recursos que Transformam seu Atendimento
            </h1>
            <p class="text-xl text-primary-foreground/90 mb-8">
              Descubra como nossa plataforma de automação pode revolucionar 
              a experiência dos seus clientes no WhatsApp.
            </p>
          </div>
        </div>
      </section>

      <!-- Stats Section -->
      <section class="py-20">
        <div class="container mx-auto px-4">
          <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <Card class="text-center shadow-soft hover:shadow-medium transition-shadow">
              <CardContent class="p-8">
                <div class="text-4xl font-bold text-primary mb-2">98%</div>
                <h3 class="text-lg font-semibold text-foreground mb-2">Taxa de Resolução</h3>
                <p class="text-sm text-muted-foreground">Problemas resolvidos automaticamente</p>
              </CardContent>
            </Card>
          </div>
        </div>
      </section>

      <!-- Features Section -->
      <section class="py-20 bg-muted">
        <div class="container mx-auto px-4">
          <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-foreground mb-4">Recursos Completos</h2>
            <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
              Tudo que sua empresa precisa para oferecer um atendimento excepcional via WhatsApp.
            </p>
          </div>

          <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <Card class="shadow-soft hover:shadow-medium transition-shadow h-full">
              <CardHeader>
                <div class="w-12 h-12 bg-gradient-hero rounded-lg flex items-center justify-center mb-4">
                  <Bot class="h-6 w-6 text-primary-foreground" />
                </div>
                <CardTitle class="text-xl">IA Conversacional Avançada</CardTitle>
              </CardHeader>
              <CardContent>
                <p class="text-muted-foreground mb-4">
                  Chatbots inteligentes que compreendem contexto e respondem de forma natural.
                </p>
                <ul class="space-y-2">
                  <li class="flex items-center text-sm">
                    <CheckCircle class="h-4 w-4 text-primary mr-2 flex-shrink-0" />
                    <span class="text-muted-foreground">Processamento de linguagem natural</span>
                  </li>
                </ul>
              </CardContent>
            </Card>
          </div>
        </div>
      </section>

      <!-- Process Section -->
      <section class="py-20">
        <div class="container mx-auto px-4">
          <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-foreground mb-4">Como Funciona</h2>
            <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
              Nossa metodologia comprovada para implementar automação de WhatsApp em sua empresa.
            </p>
          </div>

          <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center animate-slide-up">
              <div class="relative mb-6">
                <div class="w-20 h-20 bg-gradient-hero rounded-full flex items-center justify-center mx-auto mb-4">
                  <Users class="h-10 w-10 text-primary-foreground" />
                </div>
                <div class="absolute -top-2 -right-2 w-8 h-8 bg-primary rounded-full flex items-center justify-center">
                  <span class="text-xs font-bold text-primary-foreground">01</span>
                </div>
              </div>
              <h3 class="text-xl font-semibold text-foreground mb-3">Análise & Configuração</h3>
              <p class="text-muted-foreground">
                Analisamos seu negócio e configuramos a plataforma de acordo com suas necessidades.
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- API Section -->
      <section id="api" class="py-20 bg-muted">
        <div class="container mx-auto px-4">
          <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="animate-slide-up">
              <h2 class="text-3xl font-bold text-foreground mb-6">API Completa para Desenvolvedores</h2>
              <p class="text-lg text-muted-foreground mb-6">
                Integre nossa plataforma com qualquer sistema usando nossa API REST completa 
                e documentação detalhada.
              </p>
              <ul class="space-y-3 mb-8">
                <li class="flex items-center">
                  <CheckCircle class="h-5 w-5 text-primary mr-3" />
                  <span>Webhooks em tempo real</span>
                </li>
              </ul>
              <Button class="bg-primary-hover hover:bg-primary-hover/90 group">
                Ver Documentação
                <ArrowRight class="ml-2 h-4 w-4 transition-transform group-hover:translate-x-1" />
              </Button>
            </div>
          </div>
        </div>
      </section>

      <!-- CTA Section -->
      <section class="py-20">
        <div class="container mx-auto px-4">
          <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-foreground mb-6">
              Pronto para Automatizar seu WhatsApp?
            </h2>
            <p class="text-lg text-muted-foreground mb-8">
              Comece hoje mesmo e transforme a experiência dos seus clientes.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
              <Button size="lg" class="bg-primary-hover hover:bg-primary-hover/90">
                Iniciar Teste Gratuito
              </Button>
              <Button size="lg" variant="outline">
                Agendar Demonstração
              </Button>
            </div>
          </div>
        </div>
      </section>
    </main>

    <Footer />
  </div>
</template>

<script setup>
import Header from '@/components/layouts/Header.vue'
import Footer from '@/components/layouts/Footer.vue'
import Button from '../components/ui/Button.vue'
import Card from '../components/ui/Card.vue'
import CardContent from '../components/ui/CardContent.vue'
import CardHeader from '../components/ui/CardHeader.vue'
import CardTitle from '../components/ui/CardTitle.vue'
import { Bot, Users, CheckCircle, ArrowRight } from 'lucide-vue-next'
</script>
