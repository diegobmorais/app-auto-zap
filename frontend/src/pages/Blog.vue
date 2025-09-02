<template>
  <div class="min-h-screen flex flex-col">
    <Header />

    <main class="flex-1">
      <!-- Hero Section -->
      <section class="bg-gradient-hero py-20">
        <div class="container mx-auto px-4">
          <div class="max-w-4xl mx-auto text-center animate-fade-in">
            <h1 class="text-4xl lg:text-5xl font-bold text-primary-foreground mb-6">
              Blog WhatsBot Pro
            </h1>
            <p class="text-xl text-primary-foreground/90 mb-8">
              Insights, tutoriais e cases de sucesso sobre automação de WhatsApp 
              e atendimento ao cliente.
            </p>
          </div>
        </div>
      </section>

      <!-- Categories -->
      <section class="py-8 border-b">
        <div class="container mx-auto px-4">
          <div class="flex flex-wrap gap-2 justify-center">
            <Badge
              v-for="(category, index) in categories"
              :key="index"
              :variant="index === 0 ? 'default' : 'secondary'"
              class="cursor-pointer hover:bg-primary hover:text-primary-foreground transition-colors"
            >
              {{ category }}
            </Badge>
          </div>
        </div>
      </section>

      <!-- Featured Post -->
      <section class="py-16">
        <div class="container mx-auto px-4">
          <div class="max-w-6xl mx-auto">
            <Card class="overflow-hidden shadow-strong">
              <div class="grid lg:grid-cols-2 gap-0">
                <div class="aspect-video lg:aspect-auto bg-muted"></div>
                <div class="p-8 lg:p-12 flex flex-col justify-center">
                  <Badge class="mb-4 w-fit">{{ featuredPost.category }}</Badge>
                  <h2 class="text-3xl font-bold text-foreground mb-4">
                    {{ featuredPost.title }}
                  </h2>
                  <p class="text-lg text-muted-foreground mb-6">
                    {{ featuredPost.excerpt }}
                  </p>
                  <div class="flex items-center text-sm text-muted-foreground mb-6">
                    <Calendar class="h-4 w-4 mr-2" />
                    {{ featuredPost.date }}
                    <Clock class="h-4 w-4 ml-4 mr-2" />
                    {{ featuredPost.readTime }}
                  </div>
                  <Button class="w-fit group">
                    Ler Artigo
                    <ArrowRight class="ml-2 h-4 w-4 transition-transform group-hover:translate-x-1" />
                  </Button>
                </div>
              </div>
            </Card>
          </div>
        </div>
      </section>

      <!-- Regular Posts -->
      <section class="py-16 bg-muted">
        <div class="container mx-auto px-4">
          <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <Card class="overflow-hidden shadow-soft hover:shadow-medium transition-shadow group">
              <div class="aspect-video bg-gray-200"></div>
              <CardHeader>
                <div class="flex items-center justify-between mb-2">
                  <Badge variant="secondary">{{ featuredPost.category }}</Badge>
                  <div class="flex items-center text-xs text-muted-foreground">
                    <Clock class="h-3 w-3 mr-1" />
                    {{ featuredPost.readTime }}
                  </div>
                </div>
                <h3 class="text-xl font-semibold text-foreground group-hover:text-primary transition-colors">
                  {{ featuredPost.title }}
                </h3>
              </CardHeader>
              <CardContent>
                <p class="text-muted-foreground mb-4">{{ featuredPost.excerpt }}</p>
                <div class="flex items-center justify-between">
                  <div class="flex items-center text-sm text-muted-foreground">
                    <Calendar class="h-4 w-4 mr-2" />
                    {{ featuredPost.date }}
                  </div>
                  <Button variant="ghost" size="sm" class="group">
                    Ler mais
                    <ArrowRight class="ml-2 h-4 w-4 transition-transform group-hover:translate-x-1" />
                  </Button>
                </div>
              </CardContent>
            </Card>
          </div>
        </div>
      </section>

      <!-- Newsletter Section -->
      <section class="py-20">
        <div class="container mx-auto px-4">
          <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-foreground mb-6">
              Não Perca Nenhuma Novidade
            </h2>
            <p class="text-lg text-muted-foreground mb-8">
              Receba os melhores conteúdos sobre automação e atendimento diretamente no seu email.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
              <div class="flex-1">
                <input
                  type="email"
                  placeholder="Seu melhor email"
                  class="w-full px-4 py-3 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                />
              </div>
              <Button class="bg-primary-hover hover:bg-primary-hover/90">
                Inscrever-se
              </Button>
            </div>
            <p class="text-sm text-muted-foreground mt-4">
              Sem spam. Apenas conteúdo de qualidade, toda semana.
            </p>
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
import Card  from '../components/ui/Card.vue'
import CardHeader from '../components/ui/CardHeader.vue'
import CardContent from '../components/ui/CardContent.vue'

// import { Badge } from '@/components/ui/badge'
import { Calendar, Clock, ArrowRight } from 'lucide-vue-next'

// Dados mockados
const categories = [
  'Todos',
  'Automação',
  'WhatsApp Business',
  'IA & Chatbots',
  'Atendimento'
]

const posts = [
  {
    title: 'Como Automatizar 90% do seu Atendimento no WhatsApp',
    excerpt: 'Descubra as estratégias mais eficazes para automatizar seu atendimento sem perder a personalização.',
    category: 'Automação',
    date: '15 Jan 2024',
    readTime: '8 min',
    featured: true,
    image: '/api/placeholder/600/400'
  }
]

const featuredPost = posts[0]
</script>
