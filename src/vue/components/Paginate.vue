<script setup>
const emits = defineEmits(['update_current']);
const props = defineProps({
  current_page: {
    type: Number,
    required: true
  },
  total_pages: {
    type: Number,
    required: true
  }
});

function updateCurrent(e,index) {
  e.preventDefault();
  emits('update_current', index);
}
</script>
<template>
  <ul class='paginate'>
    <li
        v-for="(item, index) in total_pages"
        :key="index"
        :class="{'active': current_page === index + 1}"
    >
      <a @click="updateCurrent( $event,index + 1)" href="#">{{ item }}</a>
    </li>
  </ul>
</template>
<style>
.paginate {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  margin: 6rem auto 0;
  max-width: 900px;
@media (max-width: 950px) {
  margin: 4rem auto 0;
}
li {
  flex: 0 0 4rem;
  margin: 0 0.2rem;
  height: 4rem;
@media screen and (max-width: 768px) {
  margin-bottom: 4rem;
}
&.active {
a {
  color: white;
  background-color: var(--accent-dark);
}
}
}
a {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  font-size: 2rem;
  color: var(--accent-dark);
  border: 1px solid var(--accent-dark);
  transition: all 0.4s;
&:hover {
   color: white;
   background-color: var(--accent-dark);
 }
&.disabled {
   cursor: not-allowed !important;
   opacity: 0.6 !important;
 }
}
}
</style>