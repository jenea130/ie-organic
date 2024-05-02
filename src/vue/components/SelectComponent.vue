<script setup>
import {ref} from "@vue/reactivity";

const props = defineProps({
  label: {
    type: String,
    required: false,
  },
  value: {
    type: Object,
    required: false,
  },
  values: {
    type: Array,
    required: false,
  },
  tabindex: {
    type: Number,
    required: false,
  },
  options: {
    type: Array,
    required: true,
  },
  disabled: {
    type: Boolean,
    required: false
  }
});

const emits = defineEmits(['update:value']);

const is_visible_options = ref(false);

function getItemById(id){
  return props.options.find(item => item.id === id);
}

function toggleIsVisibleOptions() {
  is_visible_options.value = !is_visible_options.value;
}

function handleOptionClick(option) {
  if(props.values){
    let local_values= [...props.values];
    if(local_values.includes(option.id)){
      local_values.splice(local_values.indexOf(option.id), 1);
    }else{
      local_values.push(option.id);
    }
    emits('update:values', local_values);
  }else{
    emits('update:value', option);
  }
  is_visible_options.value = false;
}
</script>
<template>
  <div class="v-select prevent-select"
       :class="{'disabled': disabled}"
       :tabindex="props.tabindex || -1"
  >
    <header class="v-select__header">
      <h3 v-if="props.label" class="v-select__title filter-title">
        <span class="v-select__span">{{ props.label }}</span>
      </h3>
      <div
          :class="{ 'is-active': is_visible_options}"
          class="v-select-selected"
          @click="toggleIsVisibleOptions"
      >
        <span v-if="props.value">{{ props.value.title }}</span>
        <span v-else>
          <span v-if="props.values && props.values.length > 0">
            <span class="v-select-selected__span" v-for="item in props.values" :key="item">{{ getItemById(item).title
              }}</span>
          </span>
        </span>
      </div>
    </header>
    <ul class="v-select-options"
        v-if="is_visible_options"
        :class="{'overflow': props.options.length > 8}">
      <li v-for="item in props.options"
          :key="item.id"
          class="v-select-options__item"
          :class="{'selected': props.values && props.values.includes(item.id)}"
          @click="handleOptionClick({id: item.id, title: item.title})"
      >{{ item.title }}
      </li>
    </ul>
  </div>
</template>
<style lang="scss">
.v-select {
  position: relative;
  background-color: white;
  outline: none;
  &.disabled {
    pointer-events: none;
    cursor: not-allowed;
    opacity: 0.5;
  }
  &__header {
    padding: 0 1rem;
  }
  &-options {
    position: absolute;
    left: 0;
    top: 7rem;
    display: block;
    width: 100%;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    z-index: 5;
    &.overflow {
      height: 327px;
      overflow-y: scroll;
    }
    &__item {
      padding: 1rem 1rem;
      transition: all 0.4s;
      border-bottom: 1px solid #ccc;
      cursor: pointer;
      &:hover {
        background-color: #eee;
      }
      &.selected {
        color: white;
        background: var(--accent);
      }
    }
  }
  &__title {
    margin-bottom: 1.4rem;
  }
  &__span {
    font-style: normal;
    font-weight: bold;
    font-size: 1.8rem;
    line-height: 2.1rem;
    color: #505050;
    @media screen and (max-width: 1312px) {
      font-size: 1.5rem;
      line-height: 1.8rem;
    }
    @media screen and (max-width: 1200px) {
      font-size: 1.8rem;
      line-height: 2.1rem;
    }
  }
  &-selected {
    cursor: pointer;
    font-style: normal;
    font-weight: normal;
    font-size: 1.8rem;
    color: var(--accent);
    line-height: 2.1rem;
    position: relative;
    padding-right: 0.5rem;
    &::after {
      content: "";
      display: block;
      position: absolute;
      width: 12px;
      height: 10px;
      background-repeat: no-repeat;
      background-size: 100%;
      background-position: center center;
      top: 7px;
      right: 0;
      transition: transform 300ms ease-out;
    }
    &.is-active {
      &::after {
        transform: rotate(180deg);
      }
    }
    &__span {
      display: inline-block;
      margin-right: 0.5rem;
      padding: 0.2rem 0.4rem;
      font-size: 1.4rem;
      font-weight: bold;
      color: white;
      background: var(--accent);
      border-radius: 0.3rem;
    }
  }
}
</style>