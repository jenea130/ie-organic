<script setup>
import axios from 'axios'
import {onMounted, ref} from 'vue'
const search_input = ref('')
const is_popup_open = ref(false)
function togglePopup() {
  is_popup_open.value = !is_popup_open.value
}

const result = ref([]);
const has_errors = ref(false);

async function getSearch() {
  try {
    const data = await axios.get(`/wp-json/api/v1/search?s=${search_input.value}`);
    result.value = data.data;
    has_errors.value = false;
  } catch (error) {
    console.log(error, "error");
    has_errors.value = true;
  }
}

onMounted(() => {
  window.addEventListener('keyup', function (e) {
    if (e.key === 'Escape') {
      is_popup_open.value = false
    }
  })
})
</script>
<template>
  <div class="search">
    <div class="search__body" v-if="is_popup_open">
      <header class="search__header">
        <input class="search__input" type="text" v-model="search_input" @input="getSearch">
        <div @click="is_popup_open = false" class="search__close">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path
              d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z" />
          </svg>
        </div>
      </header>
      <div class="search__list" v-if="search_input !== ''">
        <div v-if="has_errors" class="search__error">
          <h3 class="search__subtitle">No results found</h3>
        </div>
        <div v-else-if="result && result.length">
          <div class="search__block" v-for="(item, index) in result" :key="index">
            <div v-if="item.results && item.results.length">
              <h3 class="search__subtitle">{{ item.title }}</h3>
              <ul v-if="item.results && item.results.length">
                <li v-for="(res, index) in item.results" :key="index">
                  <a :href="res.link">- {{ res.title }}</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="search__icon" @click="togglePopup">
      <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M21.4692 18.8921L16.7086 14.1315C17.8547 12.6057 18.4734 10.7485 18.4713 8.84016C18.4713 3.96573 14.5056 0 9.63118 0C4.75674 0 0.791016 3.96573 0.791016 8.84016C0.791016 13.7146 4.75674 17.6803 9.63118 17.6803C11.5395 17.6824 13.3967 17.0637 14.9225 15.9175L19.6831 20.6781C19.9241 20.8936 20.2384 21.0085 20.5615 20.9995C20.8846 20.9905 21.192 20.8581 21.4205 20.6295C21.6491 20.401 21.7815 20.0936 21.7905 19.7705C21.7996 19.4474 21.6846 19.1331 21.4692 18.8921ZM3.31678 8.84016C3.31678 7.59129 3.68711 6.37047 4.38094 5.33207C5.07478 4.29367 6.06095 3.48434 7.21476 3.00642C8.36856 2.52849 9.63818 2.40345 10.8631 2.64709C12.0879 2.89073 13.213 3.49212 14.0961 4.3752C14.9792 5.25829 15.5806 6.38341 15.8242 7.60828C16.0679 8.83315 15.9428 10.1028 15.4649 11.2566C14.987 12.4104 14.1777 13.3966 13.1393 14.0904C12.1009 14.7842 10.88 15.1546 9.63118 15.1546C7.95711 15.1526 6.35218 14.4866 5.16844 13.3029C3.98469 12.1192 3.31878 10.5142 3.31678 8.84016Z"
          fill="#FAFAFA" />
      </svg>
    </div>
  </div>
</template>

