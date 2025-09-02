<template>
    <textarea :class="computedClass" v-bind="attrs"></textarea>
</template>

<script setup>
import { computed } from 'vue'
import { useAttrs } from 'vue'

const attrs = useAttrs()

const computedClass = computed(() => {
    return [
        "w-full border border-border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary",
        attrs.class
    ].filter(Boolean).join(' ')
})
</script>
