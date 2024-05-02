<script setup>
import {ref} from "@vue/reactivity";
import SingleAddHeader from "./SingleAddHeader.vue";
import {onMounted} from "vue";
import {axiosInstance} from "../utils/axios-instances";
import SingleAddSlider from "../components/SingleAddSlider.vue";
import SingleAddTags from "../components/SingleAddTags.vue";
import SingleAddDescription from "../components/SingleAddDescription.vue";
import SingleAddCharacteristics from "../components/SingleAddCharacteristics.vue";
import SingleMap from "../components/SingleMap.vue";
import SingleAddSidebar from "../components/SingleAddSidebar.vue";

const loading = ref(true);
const immobile = ref(null);
const title = ref(null);
const code = ref(null);
const price = ref(null);
const contract = ref(null);
const foto_list = ref(null);
const features_list = ref([]);
const adds = ref([]);
const page = ref(1);
const order_by = ref('date_desc');

function shuffle(array) {
  let currentIndex = array.length, randomIndex;
  while (currentIndex !== 0) {
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex--;
    [array[currentIndex], array[randomIndex]] = [
      array[randomIndex], array[currentIndex]];
  }
  return array;
}

onMounted(() => {
  const app_key = document.getElementById("singleAdd").getAttribute("app-key");
  const auth_key = document.getElementById("singleAdd").getAttribute("auth-key");
  axiosInstance.defaults.headers.common["authkey"] = auth_key;
  axiosInstance.defaults.headers.common["appkey"] = app_key;
  const href = window.location.href;
  const steps = href.split('/');
  const id_step = steps[steps.length - 2];
  const id = id_step.split('-')[0];
  axiosInstance
      .get(`/immobili/${id}`)
      .then((resp) => {
        immobile.value = resp.data.data[0];
        code.value = immobile.value.codice;
        title.value = immobile.value.titolo + " " + immobile.value.comune + "()";
        title.value = `${immobile.value.titolo} ${immobile.value.comune} (${
            immobile.value.frazione ? immobile.value.frazione : ""
        })`;
        price.value = immobile.value.prezzo_richiesto + '';
        contract.value = immobile.value.motivazione === 1 ? 'In vendita' : 'In affitto';
        foto_list.value = immobile.value.foto_list;
        features_list.value = immobile.value.features_list;
        loading.value = false;
      })
      .catch((error) => {
        console.log(error, "error fetch comune");
        loading.value = false;
      });

  const url = `/immobili?page=${page.value}&items_per_page=50& order_by=${order_by.value}&tipo_contratto=1`;
  axiosInstance
      .post(url, {
        credentials: "same-origin",
      })
      .then((response) => {
        adds.value = response.data.data.immobili_list;
        // adds.value.forEach(item => console.log(item.id, 'item.id'))
        adds.value = shuffle(adds.value);
        adds.value = adds.value.filter(item => item.id !== immobile.id);
        adds.value = adds.value.slice(0, 2);
        loading.value = false;
      })
      .catch((error) => {
        error.value = "Si è verificato un errore. Riprova più tardi";
        loading.value = false;
      });
})
</script>
<template>
  <div class="single-add" v-if="!loading">
    <div class="single-add__container">
      <SingleAddHeader :code="code" :title="title" :price="price" :contract="contract"/>
      <SingleAddSlider v-if="foto_list.length" :foto_list="foto_list"/>
      <div class="single-add__main">
        <div class="single-add__content">
          <SingleAddTags
              :totale_mq="immobile.totale_mq"
              :locali="immobile.locali"
              :bagni="immobile.bagni"
          />
          <div class="single-add__sections">
            <SingleAddDescription
                v-if="immobile.disposizione_interna"
                :disposizione_interna="immobile.disposizione_interna"
            />
            <SingleAddCharacteristics
                :features_list="features_list"
            />
            <div class="single-add__block single-add__block--map">
              <div class="single-add__block-title">Mappa della zona dell'immobile</div>
              <div class="single-add__map-container">
                <SingleMap
                    :lat="+immobile.latitudine"
                    :lng="+immobile.longitudine"
                />
              </div>
            </div>
          </div>
        </div>
        <div class="single-add__sidebar">
          <div>
            <div class="sbr"><h2 class="sbr__title single-add__block-title"> Annunci in evidenza </h2> <!----> <!---->
              <div class="sbr__container">
                <SingleAddSidebar
                    v-for="add in adds"
                    :key="add.id"
                    :item="add"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<style lang="scss">
.single-add {
  padding-bottom: 16rem;
  @media (max-width: 950px) {
    padding-bottom: 8rem;
  }
  @media (max-width: 550px) {
    padding-bottom: 5rem;
  }
  &__container {
    max-width: 1640px;
    margin: 0 auto;
    padding: 0 20px;
    width: 100%;
  }
  &__header {
    background-color: #f6f6f6;
    padding: 17.7rem 6.4rem 6.4rem;
    position: relative;
    @media (max-width: 650px) {
      padding: 14.5rem 3.2rem 3.2rem;
    }
  }
  &__rif {
    font-size: 1.6rem;
    font-weight: 500;
    color: var(--accent-dark);
    margin-bottom: 1.6rem;
    span {
      color: var(--accent);
      font-weight: 700;
      display: inline-block;
      margin-left: 0.5rem;
    }
  }
  &__title {
    font-weight: 600;
    font-size: 6.4rem;
    letter-spacing: -0.05em;
    color: #1a2746;
    margin-bottom: 1.6rem;
    @media (max-width: 1300px) {
      font-size: 5rem;
    }
    @media (max-width: 950px) {
      font-size: 4rem;
    }
    @media (max-width: 750px) {
      font-size: 3.2rem;
    }
  }
  &__header-b {
    display: flex;
    align-items: center;
  }
  &__contract {
    font-weight: 500;
    font-size: 2rem;
    color: var(--accent-dark);
  }
  &__price {
    font-weight: 700;
    font-size: 4rem;
    color: var(--accent-dark);
    margin-left: 6.4rem;
    position: relative;
    @media (max-width: 750px) {
      font-size: 3.2rem;
    }
    @media (max-width: 400px) {
      margin-left: 3.2rem;
      font-size: 2.6rem;
    }
    &::before {
      content: "";
      display: block;
      height: 100%;
      width: 1px;
      background-color: #dedede;
      position: absolute;
      left: -3.2rem;
      top: 0;
      @media (max-width: 400px) {
        left: -1.6rem;
      }
    }
  }
  &__print-photo {
    display: none;
    height: 70rem;
    width: 100%;
    object-fit: cover;
    margin-bottom: 5rem;
  }
  &__printer {
    position: absolute;
    display: block;
    cursor: pointer;
    top: 17.7rem;
    right: 6.4rem;
    @media (max-width: 650px) {
      right: 3.2rem;
      top: 12.5rem;
    }
  }
  &__main {
    display: flex;
    margin-top: -8.4rem;
    z-index: 1;
    position: relative;
    @media (max-width: 1550px) {
      margin-top: -8.6rem;
    }
    @media (max-width: 1200px) {
      margin-top: -8.8rem;
    }
    @media (max-width: 950px) {
      display: block;
      margin-top: 3.2rem;
    }
  }
  &__content {
    flex: 1 1 100%;
    background: #f6f6f6;
  }
  &__sidebar {
    flex: 0 0 54.4rem;
    padding: 14.8rem 0 0 3.2rem;
    @media (max-width: 950px) {
      padding: 6.4rem 0 6.4rem;
    }
  }
  &__tags {
    padding: 3.2rem;
    display: flex;
    align-items: center;
    justify-content: space-around;
  }
  &__tag-item {
    display: flex;
    align-items: center;
  }
  &__tag-svg {
    width: 2.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 0.6rem;
  }
  &__tag-value {
    font-weight: 700;
    font-size: 1.6rem;
    color: #2c499c;
    span {
      font-weight: 500;
      color: #1a2746;
      display: inline-block;
      margin-right: 0.8rem;
    }
  }
  &__sections {
    padding: 0 6.4rem;
    border-top: 1px solid #dedede;
    @media (max-width: 550px) {
      padding: 0 3.2rem;
    }
  }
  &__block {
    padding: 6.4rem 0;
    @media (max-width: 550px) {
      padding: 3.2rem 0;
    }
    &:not(:last-child) {
      border-bottom: 1px solid #dedede;
    }
  }
  &__block-title {
    font-weight: 600;
    font-size: 3.2rem;
    color: #2c499c;
    margin-bottom: 3.2rem;
    @media (max-width: 550px) {
      font-size: 2.6rem;
      margin-bottom: 2.4rem;
    }
  }
  &__block-text {
    font-weight: 400;
    font-size: 1.6rem;
    color: #1a2746;
    p {
      &:not(:last-child) {
        margin-bottom: 2.4rem;
      }
    }
  }
  &__features {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: flex-start;
    margin: 0 -1.6rem;
  }
  &__row {
    flex-basis: calc(33% - 3.2rem);
    margin: 0 1.6rem 1.6rem;
    display: flex;
    font-weight: 400;
    font-size: 1.6rem;
    color: #1a2746;
    @media (max-width: 1150px) {
      flex-basis: calc(50% - 3.2rem);
    }
    @media (max-width: 950px) {
      flex-basis: calc(100% - 3.2rem);
    }
  }
  &__row-svg {
    margin-right: 1.6rem;
    svg {
      position: relative;
      top: 0.2rem;
    }
  }
  &__row-r {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
  }
  &__row-title {
    white-space: nowrap;
    padding-right: 0.8rem;
  }
  &__slider--planimetry {
    .splide__arrow {
      path {
        fill: var(--accent);
      }
    }
  }
  &__slider-pl-item {
    cursor: pointer;
    position: relative;
    overflow: hidden;
    height: 55rem;
    @media (max-width: 1000px) {
      height: 35rem;
    }
    img {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      object-fit: cover;
      transform: scale(1.05);
    }
  }
  &__video {
    height: 50rem;
  }
  &__map {
    height: 50rem;
  }
  @media print {
    padding-top: 10rem;
    padding-bottom: 0;
    &__print-photo {
      display: block;
      height: 50rem;
    }
    &__slider {
      .splide__arrow {
        display: none;
      }
    }
    &__slider-wrap {
      display: none;
    }
    &__header {
      padding: 6.4rem;
    }
    &__printer,
    &__sidebar,
    &__block--plan,
    &__block--video {
      display: none;
    }
    &__main {
      margin-top: 0;
    }
    &__map,
    &__main,
    &__block--map {
      page-break-before: auto; /* 'always,' 'avoid,' 'left,' 'inherit,' or 'right' */
      page-break-after: auto; /* 'always,' 'avoid,' 'left,' 'inherit,' or 'right' */
      page-break-inside: avoid; /* or 'auto' */
    }
  }
}
</style>
