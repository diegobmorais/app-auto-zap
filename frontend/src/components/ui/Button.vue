<template>
  <button
    :class="computedClass"
    v-bind="attrs"
  >
    <slot />
  </button>
</template>

<script setup>
import { computed } from 'vue'
import { useAttrs } from 'vue'

const attrs = useAttrs()

const computedClass = computed(() => {
  const base = "px-4 py-2 rounded-lg font-medium transition-colors flex items-center justify-center"
  const variant = attrs.variant === 'outline'
    ? "border border-primary text-primary hover:bg-primary/10"
    : "bg-primary text-primary-foreground hover:bg-primary-hover"
  
  const size = attrs.size === 'lg'
    ? "text-lg py-3 px-6"
    : attrs.size === 'sm'
      ? "text-sm py-1 px-3"
      : "text-base py-2 px-4"

  return [base, variant, size, attrs.class].filter(Boolean).join(' ')
})
</script>
