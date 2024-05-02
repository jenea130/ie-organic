<script setup>
import {ref, onMounted} from "vue";
import NewComponent from "./NewComponent.vue";

const name = ref("TEXT");
onMounted(() => {
  name.value = document.getElementById("myId").getAttribute("data-url");
});
</script>
<template>
  <div>
    <h1>NEW TEXT FROM COMPONENT</h1>
    <h2 @click="name = 'new text'">{{ name }}</h2>
    <new-component site-url="burduja.com"/>
  </div>
</template>
