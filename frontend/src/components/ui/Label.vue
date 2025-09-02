<template>
    <label :class="computedClass" v-bind="attrs" ref="labelRef">
        <slot />
    </label>
</template>

<script setup>
import { computed, ref } from 'vue'
import { useAttrs } from 'vue'

// Função para concatenar classes (similar ao cn)
function cn(...classes) {
    return classes.filter(Boolean).join(' ')
}

// Variantes de Label (simula cva)
const labelVariants = {
    base: "text-sm font-medium leading-none",
    disabled: "cursor-not-allowed opacity-70"
}

const attrs = useAttrs()
const labelRef = ref(null)

// Computed para aplicar classes
const computedClass = computed(() => {
    const isDisabled = attrs.disabled !== undefined
    return cn(
        labelVariants.base,
        isDisabled && labelVariants.disabled,
        attrs.class
    )
})
</script>
