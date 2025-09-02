<template>
  <div class="min-h-screen flex flex-col">
    <Header />

    <main class="flex-1">
      <!-- Hero Section -->
      <section class="bg-gradient-hero py-20">
        <div class="container mx-auto px-4">
          <div class="max-w-4xl mx-auto text-center animate-fade-in">
            <h1 class="text-4xl lg:text-5xl font-bold text-primary-foreground mb-6">
              Planos que Crescem com Seu Negócio
            </h1>
            <p class="text-xl text-primary-foreground/90 mb-8">
              Escolha o plano ideal para sua empresa e comece a transformar 
              seu atendimento hoje mesmo.
            </p>
            <div class="inline-flex items-center rounded-full bg-white/20 px-6 py-3 text-primary-foreground backdrop-blur-sm">
              <Star class="mr-2 h-5 w-5" />
              14 dias grátis • Sem compromisso • Suporte incluído
            </div>
          </div>
        </div>
      </section>

      <!-- Plans Section -->
      <section id="precos" class="py-20">
        <div class="container mx-auto px-4">
          <div class="grid lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <Card
              v-for="(plan, index) in plans"
              :key="index"
              :class="[
                'relative shadow-medium hover:shadow-strong transition-shadow',
                plan.popular ? 'border-primary ring-2 ring-primary/20' : ''
              ]"
            >
              <template v-if="plan.popular">
                <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                  <div class="bg-primary text-primary-foreground px-4 py-2 rounded-full text-sm font-medium">
                    Mais Popular
                  </div>
                </div>
              </template>

              <CardHeader class="text-center pb-6">
                <div :class="[
                  'w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4',
                  plan.popular ? 'bg-gradient-hero' : 'bg-muted'
                ]">
                  <component :is="plan.icon" :class="[
                    'h-8 w-8',
                    plan.popular ? 'text-primary-foreground' : 'text-primary'
                  ]"/>
                </div>
                <CardTitle class="text-2xl font-bold">{{ plan.name }}</CardTitle>
                <p class="text-muted-foreground">{{ plan.description }}</p>
                <div class="mt-4">
                  <span class="text-4xl font-bold text-primary">{{ plan.price }}</span>
                  <span class="text-muted-foreground">{{ plan.period }}</span>
                </div>
              </CardHeader>

              <CardContent>
                <ul class="space-y-3 mb-8">
                  <li v-for="(feature, fIndex) in plan.features" :key="fIndex" class="flex items-center">
                    <Check class="h-5 w-5 text-primary mr-3 flex-shrink-0"/>
                    <span class="text-muted-foreground">{{ feature }}</span>
                  </li>
                </ul>
                <Button
                  size="lg"
                  :class="plan.popular ? 'bg-primary-hover hover:bg-primary-hover/90' : 'bg-primary hover:bg-primary/90'"
                  class="w-full"
                >
                  {{ plan.cta }}
                </Button>
              </CardContent>
            </Card>
          </div>
        </div>
      </section>

      <!-- FAQ Section -->
      <section class="py-20 bg-muted">
        <div class="container mx-auto px-4">
          <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
              <h2 class="text-3xl font-bold text-foreground mb-4">Perguntas Frequentes</h2>
              <p class="text-lg text-muted-foreground">
                Tire suas dúvidas sobre nossos planos e funcionalidades.
              </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
              <Card v-for="(item, index) in faq" :key="index" class="shadow-soft">
                <CardContent class="p-6">
                  <h3 class="font-semibold text-foreground mb-3">{{ item.question }}</h3>
                  <p class="text-muted-foreground">{{ item.answer }}</p>
                </CardContent>
              </Card>
            </div>
          </div>
        </div>
      </section>

      <!-- CTA Section -->
      <section class="py-20">
        <div class="container mx-auto px-4">
          <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-foreground mb-6">
              Pronto para Transformar seu Atendimento?
            </h2>
            <p class="text-lg text-muted-foreground mb-8">
              Junte-se a centenas de empresas que já automatizaram seu WhatsApp conosco.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
              <Button size="lg" class="bg-primary-hover hover:bg-primary-hover/90">Começar Teste Gratuito</Button>
              <Button size="lg" variant="outline">Falar com Consultor</Button>
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
import { Check, Star, Zap, Crown } from 'lucide-vue-next'


// Planos
const plans = [
  {
    name: 'Starter',
    icon: Zap,
    price: 'R$ 97',
    period: '/mês',
    description: 'Perfeito para pequenas empresas começarem',
    features: [
      'Até 1.000 mensagens/mês',
      '1 número WhatsApp',
      'Chatbot básico',
      'Horário comercial',
      'Suporte por email',
      'Dashboard básico',
    ],
    popular: false,
    cta: 'Começar Agora',
  },
  {
    name: 'Professional',
    icon: Star,
    price: 'R$ 197',
    period: '/mês',
    description: 'Ideal para empresas em crescimento',
    features: [
      'Até 5.000 mensagens/mês',
      '3 números WhatsApp',
      'Chatbot avançado com IA',
      'Atendimento 24/7',
      'Suporte prioritário',
      'Analytics avançados',
      'Integrações básicas',
      'Múltiplos operadores',
    ],
    popular: true,
    cta: 'Mais Popular',
  },
  {
    name: 'Enterprise',
    icon: Crown,
    price: 'R$ 497',
    period: '/mês',
    description: 'Para empresas que precisam de máxima performance',
    features: [
      'Mensagens ilimitadas',
      'Números WhatsApp ilimitados',
      'IA personalizada',
      'SLA garantido',
      'Suporte dedicado',
      'Analytics customizados',
      'Todas as integrações',
      'API completa',
      'White label',
      'Gerente de conta',
    ],
    popular: false,
    cta: 'Falar com Vendas',
  },
]

// FAQ
const faq = [
  {
    question: 'Posso cancelar a qualquer momento?',
    answer: 'Sim, você pode cancelar seu plano a qualquer momento sem taxa de cancelamento.',
  },
  {
    question: 'Existe período de teste gratuito?',
    answer: 'Oferecemos 14 dias de teste gratuito em todos os planos para você conhecer nossa plataforma.',
  },
  {
    question: 'O que acontece se eu exceder o limite de mensagens?',
    answer: 'Você será notificado próximo ao limite e pode fazer upgrade ou pagar por mensagens extras.',
  },
  {
    question: 'Vocês oferecem suporte para migração?',
    answer: 'Sim, nossa equipe ajuda gratuitamente na migração de outras plataformas.',
  },
]
</script>
