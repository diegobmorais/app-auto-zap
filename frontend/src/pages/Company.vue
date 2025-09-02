<template>
  <div class="min-h-screen flex flex-col">
    <Header />

    <main class="flex-1">
      <!-- Hero Section -->
      <section class="bg-gradient-hero py-20">
        <div class="container mx-auto px-4">
          <div class="max-w-4xl mx-auto text-center animate-fade-in">
            <h1 class="text-4xl lg:text-5xl font-bold text-primary-foreground mb-6">
              Sobre a WhatsBot Pro
            </h1>
            <p class="text-xl text-primary-foreground/90 mb-8">
              Transformamos a forma como empresas se comunicam com seus clientes através 
              de automação inteligente e atendimento humanizado.
            </p>
          </div>
        </div>
      </section>

      <!-- Mission Section -->
      <section id="missao" class="py-20">
        <div class="container mx-auto px-4">
          <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="animate-slide-up">
              <h2 class="text-3xl font-bold text-foreground mb-6">Nossa Missão</h2>
              <p class="text-lg text-muted-foreground mb-6">
                Democratizar o acesso a tecnologias de automação avançadas, permitindo que 
                empresas de todos os tamanhos ofereçam um atendimento excepcional aos seus 
                clientes através do WhatsApp.
              </p>
              <p class="text-lg text-muted-foreground mb-8">
                Acreditamos que cada interação com o cliente é uma oportunidade de criar 
                valor e construir relacionamentos duradouros.
              </p>
              <Button class="bg-primary-hover hover:bg-primary-hover/90">Fale Conosco</Button>
            </div>

            <div class="animate-fade-in">
              <Card class="shadow-medium">
                <CardContent class="p-8 text-center">
                  <div class="text-4xl font-bold text-primary mb-2">500+</div>
                  <p class="text-muted-foreground mb-4">Empresas Atendidas</p>
                  <div class="text-4xl font-bold text-primary mb-2">2M+</div>
                  <p class="text-muted-foreground mb-4">Mensagens Processadas</p>
                  <div class="text-4xl font-bold text-primary mb-2">99.9%</div>
                  <p class="text-muted-foreground">Uptime Garantido</p>
                </CardContent>
              </Card>
            </div>
          </div>
        </div>
      </section>

      <!-- Values Section -->
      <section class="py-20 bg-muted">
        <div class="container mx-auto px-4">
          <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-foreground mb-4">Nossos Valores</h2>
            <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
              Os princípios que guiam nossa jornada e definem nossa cultura organizacional.
            </p>
          </div>

          <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <Card
              v-for="(value, index) in values"
              :key="index"
              class="text-center shadow-soft hover:shadow-medium transition-shadow"
            >
              <CardContent class="p-8">
                <div class="w-16 h-16 bg-gradient-hero rounded-full flex items-center justify-center mx-auto mb-4">
                  <component :is="value.icon" class="h-8 w-8 text-primary-foreground" />
                </div>
                <h3 class="text-xl font-semibold text-foreground mb-3">{{ value.title }}</h3>
                <p class="text-muted-foreground">{{ value.description }}</p>
              </CardContent>
            </Card>
          </div>
        </div>
      </section>

      <!-- Team Section -->
      <section id="equipe" class="py-20">
        <div class="container mx-auto px-4">
          <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-foreground mb-4">Nossa Equipe</h2>
            <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
              Conheça os profissionais dedicados que tornam tudo isso possível.
            </p>
          </div>

          <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <Card
              v-for="(member, index) in team"
              :key="index"
              class="text-center shadow-soft hover:shadow-medium transition-shadow"
            >
              <CardContent class="p-8">
                <div class="w-20 h-20 bg-gradient-hero rounded-full mx-auto mb-4 flex items-center justify-center">
                  <Users class="h-10 w-10 text-primary-foreground" />
                </div>
                <h3 class="text-xl font-semibold text-foreground mb-2">{{ member.name }}</h3>
                <p class="text-primary font-medium mb-3">{{ member.role }}</p>
                <p class="text-muted-foreground text-sm">{{ member.description }}</p>
              </CardContent>
            </Card>
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
import { Users, Target, Heart, Award } from 'lucide-vue-next'

// Equipe
const team = [
  {
    name: 'Maria Silva',
    role: 'CEO & Fundadora',
    description: 'Especialista em automações com 10+ anos de experiência em tecnologia.',
  },
  {
    name: 'João Santos',
    role: 'CTO',
    description: 'Arquiteto de software focado em IA e integração de sistemas.',
  },
  {
    name: 'Ana Costa',
    role: 'Head de Produto',
    description: 'Product Manager com expertise em UX e atendimento ao cliente.',
  },
  {
    name: 'Carlos Lima',
    role: 'Head de Vendas',
    description: 'Especialista em growth e desenvolvimento de negócios B2B.',
  },
]

// Valores da empresa
const values = [
  {
    icon: Target,
    title: 'Inovação',
    description: 'Buscamos constantemente novas formas de melhorar o atendimento através da tecnologia.',
  },
  {
    icon: Heart,
    title: 'Cuidado',
    description: 'Colocamos o sucesso dos nossos clientes no centro de tudo que fazemos.',
  },
  {
    icon: Users,
    title: 'Colaboração',
    description: 'Acreditamos no poder da colaboração para criar soluções extraordinárias.',
  },
  {
    icon: Award,
    title: 'Excelência',
    description: 'Comprometidos com a qualidade e resultados excepcionais em cada projeto.',
  },
]
</script>
