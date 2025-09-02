<template>
  <div class="bg-card p-6 rounded-xl border border-border shadow-soft hover:shadow-elegant transition-smooth">
    <div class="flex items-center justify-between mb-4">
      <div class="p-2 bg-primary/10 rounded-lg">
        <component :is="icon" class="w-6 h-6 text-primary" />
      </div>
      <div class="text-right">
        <p class="text-2xl font-bold">{{ value }}</p>
      </div>
    </div>
    
    <div>
      <h3 class="font-medium text-foreground mb-1">{{ title }}</h3>
      <div class="flex items-center gap-1">
        <TrendingUp v-if="change.trend === 'up'" class="w-4 h-4 text-primary" />
        <TrendingDown v-else class="w-4 h-4 text-destructive" />
        <span :class="['text-sm font-medium', change.trend === 'up' ? 'text-primary' : 'text-destructive']">
          {{ change.value }}
        </span>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { TrendingUp, TrendingDown } from 'lucide-vue-next'
import type { Component } from 'vue'

interface Props {
  title: string
  value: string
  change: {
    value: string
    trend: 'up' | 'down'
  }
  icon: Component
}

defineProps<Props>()
</script>