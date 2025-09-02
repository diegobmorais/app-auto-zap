<template>
    <AdminLayout>
        <div class="space-y-8">
            <!-- Header -->
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold bg-gradient-primary bg-clip-text text-transparent">
                        Clientes
                    </h1>
                    <p class="text-muted-foreground mt-2">
                        Gerencie todos os clientes do sistema
                    </p>
                </div>
                <button
                    class="flex items-center gap-2 px-4 py-2 bg-gradient-primary hover:bg-primary-hover shadow-elegant rounded-lg text-primary-foreground font-medium transition-smooth">
                    <Plus class="w-4 h-4" />
                    Novo Cliente
                </button>
            </div>

            <!-- Filters -->
            <div class="bg-card p-6 rounded-xl border border-border shadow-soft">
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="relative flex-1">
                        <Search class="w-4 h-4 absolute left-3 top-3 text-muted-foreground" />
                        <input type="text" placeholder="Buscar clientes..."
                            class="w-full pl-10 pr-4 py-2 bg-background border border-border rounded-lg focus:ring-2 focus:ring-primary/20 transition-smooth" />
                    </div>
                    <button
                        class="flex items-center gap-2 px-4 py-2 border border-border rounded-lg hover:bg-muted/50 transition-smooth">
                        <Filter class="w-4 h-4" />
                        Filtros
                    </button>
                </div>
            </div>

            <!-- Clientes List -->
            <div class="bg-card rounded-xl border border-border shadow-soft">
                <div class="p-6 border-b border-border">
                    <h3 class="text-lg font-semibold">Lista de Clientes ({{ clientes.length }})</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div v-for="cliente in clientes" :key="cliente.id"
                            class="flex items-center justify-between p-4 border border-border rounded-lg hover:bg-muted/30 transition-smooth">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 bg-gradient-primary rounded-full flex items-center justify-center text-primary-foreground font-semibold">
                                    {{ getInitials(cliente.nome) }}
                                </div>
                                <div>
                                    <h3 class="font-semibold">{{ cliente.nome }}</h3>
                                    <p class="text-sm text-muted-foreground">{{ cliente.email }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <div class="text-center hidden md:block">
                                    <p class="font-medium text-sm">{{ cliente.plano }}</p>
                                    <p class="text-xs text-muted-foreground">Plano</p>
                                </div>

                                <span :class="getStatusBadge(cliente.status)"
                                    class="px-3 py-1 rounded-full text-sm font-medium">
                                    {{ cliente.status }}
                                </span>

                                <div class="text-center hidden lg:block">
                                    <p class="font-medium text-sm">{{ cliente.cadastro }}</p>
                                    <p class="text-xs text-muted-foreground">Cadastro</p>
                                </div>

                                <button class="p-2 hover:bg-muted rounded-lg transition-smooth">
                                    <MoreHorizontal class="w-4 h-4" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup lang="ts">
import { Plus, Search, Filter, MoreHorizontal } from 'lucide-vue-next'
import AdminLayout from '@/admin/components/layouts/AdminLayout.vue'

const clientes = [
    { id: 1, nome: "Maria Silva", email: "maria@email.com", plano: "Premium", status: "Ativo", cadastro: "15/01/2024" },
    { id: 2, nome: "João Santos", email: "joao@email.com", plano: "Básico", status: "Ativo", cadastro: "12/01/2024" },
    { id: 3, nome: "Ana Costa", email: "ana@email.com", plano: "Premium", status: "Inativo", cadastro: "08/01/2024" },
    { id: 4, nome: "Carlos Lima", email: "carlos@email.com", plano: "Enterprise", status: "Ativo", cadastro: "05/01/2024" }
]

const getInitials = (nome: string) => {
    return nome.split(' ').map(n => n[0]).join('')
}

const getStatusBadge = (status: string) => {
    return status === "Ativo"
        ? "bg-primary/10 text-primary border-primary/20"
        : "bg-muted text-muted-foreground border-border"
}
</script>