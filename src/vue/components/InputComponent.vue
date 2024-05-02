<script setup>
import {computed} from "@vue/runtime-core";

const props = defineProps({
  type: {
    type: String,
    default: 'text',
  },
  label: {
    type: String,
    required: false,
  },
  placeholder: {
    type: String,
    required: false,
  },
  id: {
    type: String,
    required: false,
  },
  errors: {
    type: Array,
    required: false,
  },
  value: {
    type: [String, Number],
    required: false
  }
});

const propsValue = computed(() => {
  return props.value;
});

const emits = defineEmits(['update:value']);

function changeHandler(e) {
  let value = e.target.value;
  emits('update:value', value);
}
</script>
<template>
  <div class="v-input">
    <label v-if="label" :for="id">{{ label }}</label>
    <input
        :id="id"
        :type="type"
        :placeholder="placeholder !== undefined ? placeholder : null"
        :value="propsValue"
        @input="changeHandler"
    />
    <div v-if="errors && errors.length" class="v-input__message input__message--error">
      <p v-for="error in errors" :key="error.$uid">{{ error.$message }}</p>
    </div>
  </div>
</template>
<style lang="scss">
.v-input {
  position: relative;
  label {
    display: block;
    margin-bottom: 1.4rem;
    font-size: 1.6rem;
    font-weight: bold;
  }
  input {
    display: block;
    width: 100%;
    height: 3rem;
    padding: 0.375rem 0.75rem;
    font-size: 1.6rem;
    font-weight: 400;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    box-shadow: inset 0 0 0 transparent;
    transition: border-color 0.15s ease-in-out,
    box-shadow 0.15s ease-in-out;
    &.input--success {
      border-color: var(--success);
    }
    &.input--error {
      border-color: var(--error);
    }
  }
  &__message {
    margin-top: 0.6rem;
    font-size: 1.2rem;
    color: var(--error);
  }
}
</style>