<template>
  <AdminLayout>
    <div class="space-y-8">
      <!-- Header -->
      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-4xl font-bold bg-gradient-primary bg-clip-text text-transparent">
            Dashboard
          </h1>
          <p class="text-muted-foreground mt-2">
            Bem-vindo ao painel administrativo. Aqui está um resumo das atividades.
          </p>
        </div>
        <button
          class="flex items-center gap-2 px-4 py-2 bg-gradient-primary hover:bg-primary-hover shadow-elegant rounded-lg text-primary-foreground font-medium transition-smooth">
          <Plus class="w-4 h-4" />
          Nova Ação
        </button>
      </div>

      <!-- Stats Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <StatCard v-for="stat in stats" :key="stat.title" :title="stat.title" :value="stat.value" :change="stat.change"
          :icon="stat.icon" />
      </div>

      <!-- Charts & Activities -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Performance Chart -->
        <div class="bg-card p-6 rounded-xl border border-border shadow-soft">
          <div class="flex items-center gap-2 mb-4">
            <TrendingUp class="w-5 h-5 text-primary" />
            <h3 class="text-lg font-semibold">Performance dos Últimos 30 Dias</h3>
          </div>
          <div class="h-64 bg-gradient-subtle rounded-lg flex items-center justify-center">
            <p class="text-muted-foreground">Gráfico de Performance</p>
          </div>
        </div>

        <!-- Recent Activities -->
        <div class="bg-card p-6 rounded-xl border border-border shadow-soft">
          <h3 class="text-lg font-semibold mb-4">Atividades Recentes</h3>
          <div class="space-y-4">
            <div v-for="(activity, index) in recentActivities" :key="index"
              class="flex items-center justify-between p-3 bg-muted/30 rounded-lg">
              <div>
                <p class="font-medium text-sm">{{ activity.action }}</p>
                <p class="text-xs text-muted-foreground">{{ activity.user }}</p>
              </div>
              <span class="text-xs text-muted-foreground">{{ activity.time }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup lang="ts">
import { Users, Package, ShoppingCart, DollarSign, TrendingUp, Plus } from 'lucide-vue-next'
import AdminLayout from '@/admin/components/layouts/AdminLayout.vue'
import StatCard from '@/admin/components/ui/StatCard.vue'

const stats = [
  {
    title: "Total de Clientes",
    value: "1,247",
    change: { value: "+12% este mês", trend: "up" as const },
    icon: Users
  },
  {
    title: "Planos Ativos",
    value: "89",
    change: { value: "+3 novos", trend: "up" as const },
    icon: Package
  },
  {
    title: "Pedidos Hoje",
    value: "47",
    change: { value: "+8% ontem", trend: "up" as const },
    icon: ShoppingCart
  },
  {
    title: "Receita Mensal",
    value: "R$ 42,350",
    change: { value: "+15.3%", trend: "up" as const },
    icon: DollarSign
  }
]

const recentActivities = [
  { action: "Novo cliente cadastrado", user: "Maria Silva", time: "2 min atrás" },
  { action: "Plano Premium ativado", user: "João Santos", time: "15 min atrás" },
  { action: "Pedido #1234 processado", user: "Ana Costa", time: "32 min atrás" },
  { action: "Configuração atualizada", user: "Admin", time: "1h atrás" }
]
</script>