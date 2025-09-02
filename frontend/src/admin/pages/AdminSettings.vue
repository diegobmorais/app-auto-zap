<template>
  <AdminLayout>
    <div class="space-y-8">
      <!-- Header -->
      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-4xl font-bold bg-gradient-primary bg-clip-text text-transparent">
            Configurações
          </h1>
          <p class="text-muted-foreground mt-2">
            Gerencie as configurações do sistema
          </p>
        </div>
        <button class="flex items-center gap-2 px-4 py-2 bg-gradient-primary hover:bg-primary-hover shadow-elegant rounded-lg text-primary-foreground font-medium transition-smooth">
          <Save class="w-4 h-4" />
          Salvar Alterações
        </button>
      </div>

      <!-- Configurações Grid -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Configurações Gerais -->
        <div class="bg-card p-6 rounded-xl border border-border shadow-soft">
          <div class="flex items-center gap-2 mb-6">
            <Globe class="w-5 h-5 text-primary" />
            <h3 class="text-lg font-semibold">Configurações Gerais</h3>
          </div>
          <div class="space-y-6">
            <div class="space-y-2">
              <label class="text-sm font-medium">Nome da Empresa</label>
              <input 
                type="text" 
                v-model="config.companyName"
                class="w-full px-3 py-2 bg-background border border-border rounded-lg focus:ring-2 focus:ring-primary/20 transition-smooth"
              />
            </div>
            
            <div class="space-y-2">
              <label class="text-sm font-medium">Email Principal</label>
              <input 
                type="email" 
                v-model="config.companyEmail"
                class="w-full px-3 py-2 bg-background border border-border rounded-lg focus:ring-2 focus:ring-primary/20 transition-smooth"
              />
            </div>
            
            <div class="space-y-2">
              <label class="text-sm font-medium">Telefone</label>
              <input 
                type="text" 
                v-model="config.companyPhone"
                class="w-full px-3 py-2 bg-background border border-border rounded-lg focus:ring-2 focus:ring-primary/20 transition-smooth"
              />
            </div>
            
            <div class="space-y-2">
              <label class="text-sm font-medium">Endereço</label>
              <textarea 
                v-model="config.companyAddress"
                rows="3"
                class="w-full px-3 py-2 bg-background border border-border rounded-lg focus:ring-2 focus:ring-primary/20 transition-smooth resize-none"
              />
            </div>
          </div>
        </div>

        <!-- Notificações -->
        <div class="bg-card p-6 rounded-xl border border-border shadow-soft">
          <div class="flex items-center gap-2 mb-6">
            <Bell class="w-5 h-5 text-primary" />
            <h3 class="text-lg font-semibold">Notificações</h3>
          </div>
          <div class="space-y-6">
            <div class="flex items-center justify-between">
              <div class="space-y-0.5">
                <div class="font-medium">Novos Pedidos</div>
                <p class="text-sm text-muted-foreground">Receber notificação de novos pedidos</p>
              </div>
              <button 
                @click="notifications.newOrders = !notifications.newOrders"
                :class="[
                  'relative inline-flex h-6 w-11 items-center rounded-full transition-colors',
                  notifications.newOrders ? 'bg-primary' : 'bg-muted'
                ]"
              >
                <span :class="[
                  'inline-block h-4 w-4 transform rounded-full bg-white transition-transform',
                  notifications.newOrders ? 'translate-x-6' : 'translate-x-1'
                ]" />
              </button>
            </div>
            
            <div class="border-b border-border"></div>
            
            <div class="flex items-center justify-between">
              <div class="space-y-0.5">
                <div class="font-medium">Relatórios Semanais</div>
                <p class="text-sm text-muted-foreground">Receber relatório semanal por email</p>
              </div>
              <button 
                @click="notifications.weeklyReports = !notifications.weeklyReports"
                :class="[
                  'relative inline-flex h-6 w-11 items-center rounded-full transition-colors',
                  notifications.weeklyReports ? 'bg-primary' : 'bg-muted'
                ]"
              >
                <span :class="[
                  'inline-block h-4 w-4 transform rounded-full bg-white transition-transform',
                  notifications.weeklyReports ? 'translate-x-6' : 'translate-x-1'
                ]" />
              </button>
            </div>
          </div>
        </div>

        <!-- Segurança -->
        <div class="bg-card p-6 rounded-xl border border-border shadow-soft">
          <div class="flex items-center gap-2 mb-6">
            <Shield class="w-5 h-5 text-primary" />
            <h3 class="text-lg font-semibold">Segurança</h3>
          </div>
          <div class="space-y-6">
            <div class="space-y-2">
              <label class="text-sm font-medium">Senha Atual</label>
              <input 
                type="password" 
                v-model="security.currentPassword"
                class="w-full px-3 py-2 bg-background border border-border rounded-lg focus:ring-2 focus:ring-primary/20 transition-smooth"
              />
            </div>
            
            <div class="space-y-2">
              <label class="text-sm font-medium">Nova Senha</label>
              <input 
                type="password" 
                v-model="security.newPassword"
                class="w-full px-3 py-2 bg-background border border-border rounded-lg focus:ring-2 focus:ring-primary/20 transition-smooth"
              />
            </div>
            
            <div class="space-y-2">
              <label class="text-sm font-medium">Confirmar Senha</label>
              <input 
                type="password" 
                v-model="security.confirmPassword"
                class="w-full px-3 py-2 bg-background border border-border rounded-lg focus:ring-2 focus:ring-primary/20 transition-smooth"
              />
            </div>
          </div>
        </div>

        <!-- Preferências -->
        <div class="bg-card p-6 rounded-xl border border-border shadow-soft">
          <div class="flex items-center gap-2 mb-6">
            <Palette class="w-5 h-5 text-primary" />
            <h3 class="text-lg font-semibold">Preferências</h3>
          </div>
          <div class="space-y-6">
            <div class="space-y-2">
              <label class="text-sm font-medium">Fuso Horário</label>
              <input 
                type="text" 
                v-model="preferences.timezone"
                class="w-full px-3 py-2 bg-background border border-border rounded-lg focus:ring-2 focus:ring-primary/20 transition-smooth"
              />
            </div>
            
            <div class="space-y-2">
              <label class="text-sm font-medium">Idioma</label>
              <input 
                type="text" 
                v-model="preferences.language"
                class="w-full px-3 py-2 bg-background border border-border rounded-lg focus:ring-2 focus:ring-primary/20 transition-smooth"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup lang="ts">
import { reactive } from 'vue'
import { Save, Globe, Bell, Shield, Palette } from 'lucide-vue-next'
import AdminLayout from '@/admin/components/layouts/AdminLayout.vue'

const config = reactive({
  companyName: 'Minha Empresa LTDA',
  companyEmail: 'contato@empresa.com',
  companyPhone: '+55 (11) 99999-9999',
  companyAddress: 'Rua Example, 123 - São Paulo, SP'
})

const notifications = reactive({
  newOrders: true,
  weeklyReports: true
})

const security = reactive({
  currentPassword: '',
  newPassword: '',
  confirmPassword: ''
})

const preferences = reactive({
  timezone: 'America/Sao_Paulo',
  language: 'Português (Brasil)'
})
</script>