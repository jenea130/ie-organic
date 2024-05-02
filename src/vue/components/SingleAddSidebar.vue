<script setup>
import {computed} from "@vue/runtime-core";
import {cleanTheWord} from "../utils/helpers";

const props = defineProps({
  item: {
    type: Object,
    required: true,
  },
});
const title = computed(() => {
  return `${props.item.titolo}`;
});
const contract = computed(() => {
  return props.item.motivazione === 1 ? 'In vendita' : 'In affitto';
});


const permalink = computed(() => {
  const p1 = cleanTheWord(props.item.titolo);
  const p2 = cleanTheWord(props.item.localita);
  return `/annunci-immobiliari/${props.item.id}-${p1}-${p2}/`;
});
const photo = computed(() => {
  return props.item.foto_thumb || props.item.foto_full || null;
});
</script>
<template>
  <div class="add add--sbr">
    <div class="add__header">
      <div class="add__rif">Riferimento<span>{{ item.codice }}</span></div>
      <a :href="permalink" class="add__title"><h3>{{ title }}</h3></a>
      <div class="add__subtitle">
        <div class="add__contract">{{ contract }}</div>
        <div class="add__price" v-html="item.prezzo"></div>
      </div>
    </div>
    <a :href="permalink" class="add__img">
      <picture>
        <source :srcset="photo"
                media="(max-width: 1200px)">
        <img loading="lazy"
             :src="photo"
             alt="Appartamento a milano (brera)"></picture>
    </a>
    <div class="add__footer">
      <div class="add__footer-item">
        <div class="add__footer-svg">
          <svg width="21" height="20" viewBox="0 0 21 20" fill="none">
            <path
                d="M16.75 3.125H4.25C3.90482 3.125 3.625 3.40482 3.625 3.75V16.25C3.625 16.5952 3.90482 16.875 4.25 16.875H16.75C17.0952 16.875 17.375 16.5952 17.375 16.25V3.75C17.375 3.40482 17.0952 3.125 16.75 3.125Z"
                stroke="#1A2746" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path
                d="M14.5398 12.3722H14.3898H9.96364H9.81364V12.2222V11.2935V11.2294L9.85994 11.1851L12.4258 8.72992L12.4266 8.7292L12.4266 8.7292C12.8146 8.36308 12.9935 7.98635 12.9935 7.59692C12.9935 7.32386 12.9105 7.11997 12.7549 6.9689C12.599 6.81754 12.3859 6.73543 12.0988 6.73543C11.7802 6.73543 11.5644 6.82692 11.4236 6.9877C11.2766 7.15548 11.1961 7.38211 11.195 7.68224L11.2218 7.97879L11.2367 8.14232H11.0725H9.96364H9.83225L9.81495 8.01208C9.80163 7.91188 9.79531 7.79773 9.79531 7.67048C9.79531 7.00546 10.0026 6.45599 10.4264 6.03734L14.5398 12.3722ZM14.5398 12.3722V12.2222M14.5398 12.3722V12.2222M14.5398 12.2222V11.1923V11.0423H14.3898H11.8889L13.261 9.82437C13.2611 9.82433 13.2611 9.82429 13.2612 9.82424C13.672 9.46196 13.9706 9.10758 14.1473 8.76009C14.331 8.4108 14.4206 8.01254 14.4206 7.56933C14.4206 6.93846 14.2116 6.41362 13.7882 6.00847M14.5398 12.2222L13.7882 6.00847M13.7882 6.00847C13.3688 5.60115 12.7993 5.40554 12.0988 5.40554C11.4186 5.40554 10.8561 5.61281 10.4264 6.03733L13.7882 6.00847Z"
                fill="#1A2746" stroke="#1A2746" stroke-width="0.3"></path>
          </svg>
        </div>
        <div class="add__footer-label">
          327 m<sup>2</sup></div>
      </div>
      <div class="add__footer-item">
        <div class="add__footer-svg">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
            <path
                d="M8.125 13.125V6.25H16.25C16.913 6.25 17.5489 6.51339 18.0178 6.98223C18.4866 7.45107 18.75 8.08696 18.75 8.75V13.125"
                stroke="#1A2746" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M1.25 16.25V3.75" stroke="#1A2746" stroke-width="1.5" stroke-linecap="round"
                  stroke-linejoin="round"></path>
            <path d="M1.25 13.125H18.75V16.25" stroke="#1A2746" stroke-width="1.5" stroke-linecap="round"
                  stroke-linejoin="round"></path>
            <path d="M8.125 6.25H1.25" stroke="#1A2746" stroke-width="1.5" stroke-linecap="round"
                  stroke-linejoin="round"></path>
          </svg>
        </div>
        <div class="add__footer-label"><span>Locali</span> 14
        </div>
      </div>
      <div class="add__footer-item">
        <div class="add__footer-svg">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
            <path d="M5.625 15V16.875" stroke="#1A2746" stroke-width="1.5" stroke-linecap="round"
                  stroke-linejoin="round"></path>
            <path d="M14.375 15V16.875" stroke="#1A2746" stroke-width="1.5" stroke-linecap="round"
                  stroke-linejoin="round"></path>
            <path
                d="M4.375 8.125V4.0625C4.375 3.6481 4.53962 3.25067 4.83265 2.95765C5.12567 2.66462 5.5231 2.5 5.9375 2.5C6.3519 2.5 6.74933 2.66462 7.04235 2.95765C7.33538 3.25067 7.5 3.6481 7.5 4.0625"
                stroke="#1A2746" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M15.625 7.5H10.625V11.25H15.625V7.5Z" stroke="#1A2746" stroke-width="1.5"
                  stroke-linecap="round" stroke-linejoin="round"></path>
            <path
                d="M15.625 8.125H18.125C18.2908 8.125 18.4497 8.19085 18.5669 8.30806C18.6842 8.42527 18.75 8.58424 18.75 8.75V11.25C18.75 12.2446 18.3549 13.1984 17.6517 13.9017C16.9484 14.6049 15.9946 15 15 15H5C4.00544 15 3.05161 14.6049 2.34835 13.9017C1.64509 13.1984 1.25 12.2446 1.25 11.25V8.75C1.25 8.58424 1.31585 8.42527 1.43306 8.30806C1.55027 8.19085 1.70924 8.125 1.875 8.125H10.625"
                stroke="#1A2746" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
        </div>
        <div class="add__footer-label"><span>Bagni</span> 3
        </div>
      </div>
    </div>
    <div class="add__accent">
      <svg width="16" height="35" viewBox="0 0 16 35" fill="none">
        <path d="M16 0V35H0L16 0Z" fill="#2C499C"></path>
      </svg>
      <span>In Evidenza</span>
      <svg width="16" height="35" viewBox="0 0 16 35" fill="none">
        <path d="M0 35V0H16L0 35Z" fill="#2C499C"></path>
      </svg>
      <svg width="16" height="8" viewBox="0 0 16 8" fill="none">
        <path d="M0 0V8H16L0 0Z" fill="#1A2746"></path>
      </svg>
    </div>
  </div>
</template>

