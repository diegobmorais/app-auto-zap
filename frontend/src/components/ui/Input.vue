<template>
    <input :id="id" :type="type" :placeholder="placeholder" :value="modelValue"
        :class="['border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary', customClass]"
        :required="required" @input="$emit('update:modelValue', $event.target.value)" />
</template>

<script setup>
defineProps({
    id: String,
    type: { type: String, default: 'text' },
    placeholder: { type: String, default: '' },
    modelValue: [String, Number],
    required: { type: Boolean, default: false },
    customClass: { type: String, default: '' },
})

defineEmits(['update:modelValue'])
</script>
