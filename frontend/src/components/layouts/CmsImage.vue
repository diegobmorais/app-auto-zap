<template>
    <img :src="src" :alt="alt" :class="className" @error="onError" />
</template>

<script setup>
const props = defineProps({
    src: String,
    alt: String,
    className: String
})

const onError = (event) => {
    event.target.src = 'https://via.placeholder.com/150'
}

</script>