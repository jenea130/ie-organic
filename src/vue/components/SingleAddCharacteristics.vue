<script setup="">
const props = defineProps({
  features_list: {
    type: Array,
    required: false,
  },
});
</script>
<template>
  <div v-if="features_list && features_list.length" class="single-add__block">
    <div class="single-add__block-title">Altre caratteristiche</div>
    <div class="single-add__features">
      <div v-for="item in features_list" class="single-add__row">
        <div class="single-add__row-svg">
          <svg width="17" height="13" viewBox="0 0 17 13" fill="none">
            <path d="M15.5625 1.6875L5.9375 11.3125L1.125 6.5" stroke="#00C74F" stroke-width="1.5"
                  stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
        </div>
        <div class="single-add__row-r">
          <div class="single-add__row-title">{{ item.label}}</div>
          <div class="single-add__row-value">{{ item.value}}</div>
        </div>
      </div>
    </div>
  </div>
</template>
<style lang="scss" scoped>

</style>