<script setup>
const props = defineProps({
    siteUrl: {
        type: String,
        default: 'https://www.google.com'
    }
})
</script>

<template>
    <div>
        <h1>New Componennt</h1>
        <p>{{ siteUrl }}</p>
    </div>
</template>