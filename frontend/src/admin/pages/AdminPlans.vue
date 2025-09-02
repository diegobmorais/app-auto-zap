<template>
  <AdminLayout>
    <div class="space-y-8">
      <!-- Header -->
      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-4xl font-bold bg-gradient-primary bg-clip-text text-transparent">
            Planos
          </h1>
          <p class="text-muted-foreground mt-2">
            Gerencie os planos de assinatura disponíveis
          </p>
        </div>
        <button class="flex items-center gap-2 px-4 py-2 bg-gradient-primary hover:bg-primary-hover shadow-elegant rounded-lg text-primary-foreground font-medium transition-smooth">
          <Plus class="w-4 h-4" />
          Novo Plano
        </button>
      </div>

      <!-- Planos Grid -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div 
          v-for="plano in planos" 
          :key="plano.id"
          :class="[
            'relative bg-card p-6 rounded-xl border shadow-soft transition-smooth hover:shadow-elegant',
            plano.popular ? 'border-primary ring-2 ring-primary/20' : 'border-border'
          ]"
        >
          <div v-if="plano.popular" class="absolute -top-3 left-1/2 transform -translate-x-1/2">
            <span class="bg-gradient-primary text-primary-foreground px-4 py-1 rounded-full text-sm font-medium">
              Mais Popular
            </span>
          </div>
          
          <div class="text-center pb-4">
            <h3 class="text-2xl font-bold">{{ plano.nome }}</h3>
            <div class="mt-4">
              <span class="text-4xl font-bold text-primary">{{ plano.preco }}</span>
              <span class="text-muted-foreground">{{ plano.periodo }}</span>
            </div>
            <p class="text-sm text-muted-foreground mt-2">
              {{ plano.usuarios }} usuários ativos
            </p>
          </div>
          
          <div class="space-y-4">
            <div class="space-y-3">
              <div 
                v-for="(recurso, index) in plano.recursos" 
                :key="index"
                class="flex items-center gap-2"
              >
                <Check class="w-4 h-4 text-primary flex-shrink-0" />
                <span class="text-sm">{{ recurso }}</span>
              </div>
            </div>
            
            <div class="pt-4 space-y-2">
              <button 
                :class="[
                  'w-full px-4 py-2 rounded-lg font-medium transition-smooth',
                  plano.popular ? 'bg-gradient-primary text-primary-foreground hover:bg-primary-hover' : 'border border-border hover:bg-muted/50'
                ]"
              >
                Gerenciar Plano
              </button>
              <button class="w-full px-4 py-2 text-muted-foreground hover:text-foreground hover:bg-muted/50 rounded-lg transition-smooth">
                Ver Detalhes
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Statistics -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-card p-6 rounded-xl border border-border shadow-soft text-center">
          <div class="text-3xl font-bold text-primary mb-2">247</div>
          <div class="text-sm text-muted-foreground">Total de Assinaturas</div>
        </div>
        
        <div class="bg-card p-6 rounded-xl border border-border shadow-soft text-center">
          <div class="text-3xl font-bold text-primary mb-2">R$ 18.470</div>
          <div class="text-sm text-muted-foreground">Receita Mensal</div>
        </div>
        
        <div class="bg-card p-6 rounded-xl border border-border shadow-soft text-center">
          <div class="text-3xl font-bold text-primary mb-2">94%</div>
          <div class="text-sm text-muted-foreground">Taxa de Renovação</div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup lang="ts">
import { Plus, Check } from 'lucide-vue-next'
import AdminLayout from '@/admin/components/layouts/AdminLayout.vue'

const planos = [
  {
    id: 1,
    nome: "Básico",
    preco: "R$ 29,90",
    periodo: "/mês",
    usuarios: 125,
    recursos: ["5 Usuários", "10GB Armazenamento", "Suporte Email", "Dashboard Básico"],
    status: "Ativo",
    popular: false
  },
  {
    id: 2,
    nome: "Premium",
    preco: "R$ 79,90",
    periodo: "/mês",
    usuarios: 89,
    recursos: ["25 Usuários", "100GB Armazenamento", "Suporte Prioritário", "Relatórios Avançados", "API Access"],
    status: "Ativo",
    popular: true
  },
  {
    id: 3,
    nome: "Enterprise",
    preco: "R$ 199,90",
    periodo: "/mês",
    usuarios: 33,
    recursos: ["Usuários Ilimitados", "500GB Armazenamento", "Suporte 24/7", "White Label", "Integração Custom"],
    status: "Ativo",
    popular: false
  }
]
</script>