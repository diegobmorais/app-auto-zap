<template>
    <div :class="['bg-white rounded-lg shadow', customClass]">
        <slot />
    </div>
</template>

<script setup>
defineProps({
    customClass: { type: String, default: '' }
})
</script>
