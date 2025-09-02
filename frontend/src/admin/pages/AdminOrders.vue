<template>
  <AdminLayout>
    <div class="space-y-8">
      <!-- Header -->
      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-4xl font-bold bg-gradient-primary bg-clip-text text-transparent">
            Pedidos
          </h1>
          <p class="text-muted-foreground mt-2">
            Acompanhe todos os pedidos e transações
          </p>
        </div>
        <div class="flex gap-2">
          <button class="flex items-center gap-2 px-4 py-2 border border-border rounded-lg hover:bg-muted/50 transition-smooth">
            <Download class="w-4 h-4" />
            Exportar
          </button>
          <button class="flex items-center gap-2 px-4 py-2 bg-gradient-primary hover:bg-primary-hover shadow-elegant rounded-lg text-primary-foreground font-medium transition-smooth">
            <Plus class="w-4 h-4" />
            Novo Pedido
          </button>
        </div>
      </div>

      <!-- Filters -->
      <div class="bg-card p-6 rounded-xl border border-border shadow-soft">
        <div class="flex flex-col sm:flex-row gap-4">
          <div class="relative flex-1">
            <Search class="w-4 h-4 absolute left-3 top-3 text-muted-foreground" />
            <input 
              type="text"
              placeholder="Buscar pedidos..."
              class="w-full pl-10 pr-4 py-2 bg-background border border-border rounded-lg focus:ring-2 focus:ring-primary/20 transition-smooth"
            />
          </div>
          <button class="flex items-center gap-2 px-4 py-2 border border-border rounded-lg hover:bg-muted/50 transition-smooth">
            <Filter class="w-4 h-4" />
            Filtros
          </button>
        </div>
      </div>

      <!-- Pedidos Table -->
      <div class="bg-card rounded-xl border border-border shadow-soft">
        <div class="p-6 border-b border-border">
          <h3 class="text-lg font-semibold">Lista de Pedidos ({{ pedidos.length }})</h3>
        </div>
        <div class="p-6">
          <div class="overflow-x-auto">
            <table class="w-full">
              <thead>
                <tr class="border-b border-border">
                  <th class="text-left py-3 px-2 font-medium text-muted-foreground">ID</th>
                  <th class="text-left py-3 px-2 font-medium text-muted-foreground">Cliente</th>
                  <th class="text-left py-3 px-2 font-medium text-muted-foreground">Plano</th>
                  <th class="text-left py-3 px-2 font-medium text-muted-foreground">Valor</th>
                  <th class="text-left py-3 px-2 font-medium text-muted-foreground">Status</th>
                  <th class="text-left py-3 px-2 font-medium text-muted-foreground">Data</th>
                  <th class="text-left py-3 px-2 font-medium text-muted-foreground">Método</th>
                  <th class="text-left py-3 px-2 font-medium text-muted-foreground">Ações</th>
                </tr>
              </thead>
              <tbody>
                <tr 
                  v-for="pedido in pedidos" 
                  :key="pedido.id"
                  class="border-b border-border/50 hover:bg-muted/30 transition-smooth"
                >
                  <td class="py-4 px-2 font-mono text-sm">{{ pedido.id }}</td>
                  <td class="py-4 px-2 font-medium">{{ pedido.cliente }}</td>
                  <td class="py-4 px-2">{{ pedido.plano }}</td>
                  <td class="py-4 px-2 font-semibold text-primary">{{ pedido.valor }}</td>
                  <td class="py-4 px-2">
                    <span :class="getStatusBadge(pedido.status)" class="px-3 py-1 rounded-full text-sm font-medium">
                      {{ pedido.status }}
                    </span>
                  </td>
                  <td class="py-4 px-2 text-muted-foreground">{{ pedido.data }}</td>
                  <td class="py-4 px-2">{{ pedido.metodo }}</td>
                  <td class="py-4 px-2">
                    <button class="p-2 hover:bg-muted rounded-lg transition-smooth">
                      <Eye class="w-4 h-4" />
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup lang="ts">
import { Plus, Search, Filter, Download, Eye } from 'lucide-vue-next'
import AdminLayout from '@/admin/components/layouts/AdminLayout.vue'

const pedidos = [
  { id: "#PD001", cliente: "Maria Silva", plano: "Premium", valor: "R$ 79,90", status: "Processando", data: "15/01/2024", metodo: "Cartão" },
  { id: "#PD002", cliente: "João Santos", plano: "Básico", valor: "R$ 29,90", status: "Concluído", data: "14/01/2024", metodo: "PIX" },
  { id: "#PD003", cliente: "Ana Costa", plano: "Enterprise", valor: "R$ 199,90", status: "Pendente", data: "13/01/2024", metodo: "Boleto" },
  { id: "#PD004", cliente: "Carlos Lima", plano: "Premium", valor: "R$ 79,90", status: "Concluído", data: "12/01/2024", metodo: "Cartão" },
  { id: "#PD005", cliente: "Elena Santos", plano: "Básico", valor: "R$ 29,90", status: "Cancelado", data: "11/01/2024", metodo: "PIX" }
]

const getStatusBadge = (status: string) => {
  switch(status) {
    case "Concluído":
      return "bg-primary/10 text-primary border-primary/20"
    case "Processando": 
      return "bg-yellow-100 text-yellow-800 border-yellow-200"
    case "Pendente":
      return "bg-orange-100 text-orange-800 border-orange-200"
    case "Cancelado":
      return "bg-destructive/10 text-destructive border-destructive/20"
    default:
      return "bg-muted text-muted-foreground border-border"
  }
}
</script>