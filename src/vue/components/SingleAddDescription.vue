<script setup>
const props = defineProps({
  disposizione_interna: {
    type: String,
    required: true,
  },
});
</script>
<template>
  <div class="single-add__block">
    <div class="single-add__block-title">Descrizione</div>
    <div class="single-add__block-text">{{ disposizione_interna }}</div>
  </div>
</template>

