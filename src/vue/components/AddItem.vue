<script setup>
import {clearPrice, cleanTheWord} from "../utils/helpers";
import {computed} from "@vue/runtime-core";

const props = defineProps({
  add: {
    type: Object,
    required: true,
  },
  className: {
    type: String,
    default: "",
  },

  siteUrl: {
    type: String,
    required: true,
  },
  accentItem: {
    type: Boolean,
    default: false,
  },
});
const title = computed(() => {
  return `${props.add.titolo} a ${props.add.localita.toLowerCase()}`;
});

const price = computed(() => {
  return clearPrice(props.add.prezzo);
});
const photo = computed(() => {
  return props.add.foto_thumb || props.add.foto_full || null;
});
const permalink = computed(() => {
  const p1 = cleanTheWord(props.add.titolo);
  const p2 = cleanTheWord(props.add.localita);
  return `/annunci-immobiliari/${props.add.id}-${p1}-${p2}/`;
});
</script>
<template>
  <div class="add" :class="className">
    <div class="add__header">
      <div class="add__rif">
        Riferimento <span>{{ add.codice }}</span>
      </div>
      <a v-if="accentItem" :href="permalink" class="add__title">
        <h3>
          {{ add.titolo }} a <span>{{ add.localita.toLowerCase() }}</span>
        </h3>
      </a>
      <a v-else :href="permalink" class="add__title"
      >{{ add.titolo }} a <span>{{ add.localita.toLowerCase() }}</span></a
      >
      <div class="add__subtitle">
        <div class="add__contract">
          In {{ add.vendita_1_affito_2 === 1 ? "Vendita" : "Affitto" }}
        </div>
        <div class="add__price">€ {{ price }}</div>
      </div>
    </div>
    <a :href="permalink" class="add__img">
      <picture v-if="photo">
        <source
            :srcset="add.foto_thumb || photo"
            media="(max-width: 1200px)"
        />
        <img loading="lazy" :src="add.foto_full || photo" :alt="title"/>
      </picture>
      <img
          v-else
          :src="`${siteUrl}/wp-content/uploads/2022/09/logo2.svg`"
          :alt="title"
          class="add__img-no-photo"
      />
    </a>

    <div class="add__footer">
      <div class="add__footer-item">
        <div class="add__footer-svg">
          <svg width="21" height="20" viewBox="0 0 21 20" fill="none">
            <path
                d="M16.75 3.125H4.25C3.90482 3.125 3.625 3.40482 3.625 3.75V16.25C3.625 16.5952 3.90482 16.875 4.25 16.875H16.75C17.0952 16.875 17.375 16.5952 17.375 16.25V3.75C17.375 3.40482 17.0952 3.125 16.75 3.125Z"
                stroke="#1A2746"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            />
            <path
                d="M14.5398 12.3722H14.3898H9.96364H9.81364V12.2222V11.2935V11.2294L9.85994 11.1851L12.4258 8.72992L12.4266 8.7292L12.4266 8.7292C12.8146 8.36308 12.9935 7.98635 12.9935 7.59692C12.9935 7.32386 12.9105 7.11997 12.7549 6.9689C12.599 6.81754 12.3859 6.73543 12.0988 6.73543C11.7802 6.73543 11.5644 6.82692 11.4236 6.9877C11.2766 7.15548 11.1961 7.38211 11.195 7.68224L11.2218 7.97879L11.2367 8.14232H11.0725H9.96364H9.83225L9.81495 8.01208C9.80163 7.91188 9.79531 7.79773 9.79531 7.67048C9.79531 7.00546 10.0026 6.45599 10.4264 6.03734L14.5398 12.3722ZM14.5398 12.3722V12.2222M14.5398 12.3722V12.2222M14.5398 12.2222V11.1923V11.0423H14.3898H11.8889L13.261 9.82437C13.2611 9.82433 13.2611 9.82429 13.2612 9.82424C13.672 9.46196 13.9706 9.10758 14.1473 8.76009C14.331 8.4108 14.4206 8.01254 14.4206 7.56933C14.4206 6.93846 14.2116 6.41362 13.7882 6.00847M14.5398 12.2222L13.7882 6.00847M13.7882 6.00847C13.3688 5.60115 12.7993 5.40554 12.0988 5.40554C11.4186 5.40554 10.8561 5.61281 10.4264 6.03733L13.7882 6.00847Z"
                fill="#1A2746"
                stroke="#1A2746"
                stroke-width="0.3"
            />
          </svg>
        </div>
        <div class="add__footer-label">
          {{ parseInt(add.superficie).toFixed(0) }} m<sup>2</sup>
        </div>
      </div>

      <div v-if="add.locali && add.locali !== '0'" class="add__footer-item">
        <div class="add__footer-svg">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
            <path
                d="M8.125 13.125V6.25H16.25C16.913 6.25 17.5489 6.51339 18.0178 6.98223C18.4866 7.45107 18.75 8.08696 18.75 8.75V13.125"
                stroke="#1A2746"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            />
            <path
                d="M1.25 16.25V3.75"
                stroke="#1A2746"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            />
            <path
                d="M1.25 13.125H18.75V16.25"
                stroke="#1A2746"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            />
            <path
                d="M8.125 6.25H1.25"
                stroke="#1A2746"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            />
          </svg>
        </div>
        <div class="add__footer-label">
          <span>Locali</span> {{ add.locali }}
        </div>
      </div>

      <div v-if="add.bagni && add.bagni !== '0'" class="add__footer-item">
        <div class="add__footer-svg">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
            <path
                d="M5.625 15V16.875"
                stroke="#1A2746"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            />
            <path
                d="M14.375 15V16.875"
                stroke="#1A2746"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            />
            <path
                d="M4.375 8.125V4.0625C4.375 3.6481 4.53962 3.25067 4.83265 2.95765C5.12567 2.66462 5.5231 2.5 5.9375 2.5C6.3519 2.5 6.74933 2.66462 7.04235 2.95765C7.33538 3.25067 7.5 3.6481 7.5 4.0625"
                stroke="#1A2746"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            />
            <path
                d="M15.625 7.5H10.625V11.25H15.625V7.5Z"
                stroke="#1A2746"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            />
            <path
                d="M15.625 8.125H18.125C18.2908 8.125 18.4497 8.19085 18.5669 8.30806C18.6842 8.42527 18.75 8.58424 18.75 8.75V11.25C18.75 12.2446 18.3549 13.1984 17.6517 13.9017C16.9484 14.6049 15.9946 15 15 15H5C4.00544 15 3.05161 14.6049 2.34835 13.9017C1.64509 13.1984 1.25 12.2446 1.25 11.25V8.75C1.25 8.58424 1.31585 8.42527 1.43306 8.30806C1.55027 8.19085 1.70924 8.125 1.875 8.125H10.625"
                stroke="#1A2746"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            />
          </svg>
        </div>
        <div class="add__footer-label">
          <span>Bagni</span> {{ add.bagni }}
        </div>
      </div>
    </div>
    <div class="add__accent" v-if="accentItem">
      <svg width="16" height="35" viewBox="0 0 16 35" fill="none">
        <path d="M16 0V35H0L16 0Z" fill="#2C499C"/>
      </svg>

      <span>In Evidenza</span>

      <svg width="16" height="35" viewBox="0 0 16 35" fill="none">
        <path d="M0 35V0H16L0 35Z" fill="#2C499C"/>
      </svg>

      <svg width="16" height="8" viewBox="0 0 16 8" fill="none">
        <path d="M0 0V8H16L0 0Z" fill="#1A2746"/>
      </svg>
    </div>
  </div>
</template>
<style lang="scss">
.add {
  background: #f6f6f6;
  display: flex;
  flex-direction: column;
  &__header {
    padding: 6.4rem;
    @media (max-width: 1400px) {
      padding: 3.2rem;
    }
    @media (max-width: 450px) {
      padding: 1.6rem;
    }
  }
  &__rif {
    font-weight: 500;
    font-size: 1.6rem;
    line-height: lh(16, 19);
    color: #1a2746;
    margin-bottom: 0.8rem;
    span {
      color: var(--accent);
      font-weight: 700;
      display: inline-block;
      margin-left: 0.8rem;
    }
  }
  &__title {
    display: block;
    font-weight: 600;
    font-size: 3.2rem;
    line-height: lh(32, 39);
    letter-spacing: -0.05em;
    color: #1a2746;
    margin-bottom: 0.8rem;
    transition: color 0.3s ease-out;
    span {
      text-transform: capitalize;
    }
    @media (max-width: 1100px) {
      font-size: 2.8rem;
    }
    @media (max-width: 850px) {
      font-size: 2.5rem;
    }
    @media (max-width: 450px) {
      font-size: 2rem;
    }
    &:hover {
      color: var(--accent);
    }
  }
  &__subtitle {
    display: flex;
    align-items: center;
    font-size: 2rem;
    line-height: lh(20, 24);
    color: var(--accent);
  }
  &__contract {
    font-weight: 500;
    padding-right: 3.2rem;
    margin-right: 3.2rem;
    border-right: 1px solid #dedede;
  }
  &__price {
    font-weight: 700;
  }
  &__img {
    display: block;
    height: 44.1rem;
    position: relative;
    overflow: hidden;
    margin-top: auto;
    background-color: var(--accent);
    @media (max-width: 1300px) {
      height: 34rem;
    }
    @media (max-width: 700px) {
      height: 48vw;
    }
    &:hover {
      &::after {
        opacity: 1;
      }
      img {
        transform: scale(1.5);
      }
    }
    &::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(#000, 0.3);
      transition: opacity 2s ease-out;
      opacity: 0;
      z-index: 1;
      pointer-events: none;
    }
    img {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      object-fit: cover;
      object-position: center;
      transition: transform 18s ease-out;
      will-change: transform;
      backface-visibility: hidden;
      &.add__img-no-photo {
        width: auto;
        height: auto;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 100%;
        max-height: 100%;
      }
    }
  }
  &__footer {
    padding: 3.2rem;
    display: flex;
    align-items: center;
    justify-content: space-around;
    @media (max-width: 850px) {
      justify-content: space-between;
    }
    @media (max-width: 450px) {
      padding: 1.6rem;
    }
  }
  &__footer-item {
    display: flex;
    align-items: center;
  }
  &__footer-svg {
    margin-right: 0.8rem;
    display: flex;
    align-items: center;
    @media (max-width: 350px) {
      margin-right: 0.4rem;
    }
  }
  &__footer-label {
    font-weight: 700;
    font-size: 1.6rem;
    line-height: lh(16, 19);
    color: #2c499c;
    @media (max-width: 350px) {
      font-size: 1.4rem;
    }
    span {
      font-weight: 500;
      display: inline-block;
      margin-right: 0.8rem;
      color: #1a2746;
      @media (max-width: 350px) {
        margin-right: 0.4rem;
      }
    }
  }
}
.add--sbr {
  position: relative;
  &:not(&:last-child) {
    margin-bottom: 3.2rem;
  }
  .add__header {
    padding: 3.2rem;
  }
  .add__img {
    height: 28.8rem;
  }
  .add__accent {
    position: absolute;
    background: #2c499c;
    padding: 0.8rem 1.6rem;
    font-weight: 600;
    font-size: 1.6rem;
    line-height: lh(16, 19);
    color: #ffffff;
    top: 50%;
    right: 0;
    z-index: 10;
    pointer-events: none;
    svg {
      position: absolute;
      &:first-of-type {
        top: 0;
        right: calc(100% - 1px);
        height: 100%;
        @media (max-width: 1200px) {
          right: calc(100% - 2px);
        }
      }
      &:nth-of-type(2) {
        top: 0;
        left: calc(100% - 1px);
        height: 100%;
        @media (max-width: 1200px) {
          left: calc(100% - 2px);
        }
      }
      &:nth-of-type(3) {
        bottom: 100%;
        left: 100%;
        @media (max-width: 1200px) {
          left: calc(100% - 2px);
        }
      }
    }
  }
}
</style>
