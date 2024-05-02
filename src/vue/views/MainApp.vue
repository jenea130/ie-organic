<script lang="ts" setup>
import {axiosInstance} from "../utils/axios-instances";
import SelectComponent from "../components/SelectComponent.vue";
import {ref} from "@vue/reactivity";
import {onMounted, watch} from "vue";
import InputComponent from "../components/InputComponent.vue";
import {useRangeOfObjects} from "../hooks/useRangeOfObjects";
import {
  mq_max_list_data,
  mq_min_list_data,
  prices_max_data,
  prices_min_data,
} from "../filter-data";
import {computed} from "@vue/runtime-core";
import AddItem from "../components/AddItem.vue";
import LoadingComponent from "../components/LoadingComponent.vue";
import Paginate from "../components/Paginate.vue";

const site_url = document.getElementById("mainApp")?.getAttribute("data-url");
const app_key = document.getElementById("mainApp")?.getAttribute("app-key");
const auth_key = document.getElementById("mainApp")?.getAttribute("auth-key");
axiosInstance.defaults.headers.common["authkey"] = auth_key;
axiosInstance.defaults.headers.common["appkey"] = app_key;
const loading = ref(true);
const error = ref(false);
const default_count = ref(null);
const default_title = ref(null);
const current_page = ref(1);
const pages_count = ref(null);
const filtered = ref([]);
const items_per_page = ref(8);
const orders_by = [
  {
    id: "date_desc",
    title: "Più recenti",
  },
  {
    id: "price_desc",
    title: "Più costosi",
  },
  {
    id: "area_desc",
    title: "Più grandi",
  },
  {
    id: "price_asc",
    title: "Meno costosi",
  },
  {
    id: "area_asc",
    title: "Meno grandi",
  },
  {
    id: "date_asc",
    title: "Meno recenti",
  },
];
const order_by = ref(orders_by[0]);
const zone_label = "Tutte";
const cities = ref([]);
const city = ref();
const real_estates = ref(null);

function fetchCity() {
  axiosInstance
      .post(`/comuni?id_provincia=`)
      .then((resp) => {
        cities.value = resp.data.data.comune_list;
        cities.value.unshift({
          id_comune: "",
          comune: "Tutte",
        });
        cities.value = cities.value.map((item) => {
          return {
            id: item.id_comune,
            title: item.comune,
          };
        });
        city.value = cities.value[0];
      })
      .catch((error) => {
        console.log(error, "error fetch comune");
      });
}

watch(city, (new_value) => {
  current_page.value = 1;
  if (new_value.id) {
    fetchZones();
  } else {
    zones.value = [{id: "", title: zone_label}];
    zone.value = zones.value[0];
  }
});
const zones = ref([]);
const zone = ref({id: 12345678, title: "Tutte"});
const zone_computed = computed(() => {
  return zones.value.length === 1;
});
watch(zone, () => {
  current_page.value = 1;
});

function fetchZones() {
  axiosInstance
      .post(`/frazioni?id_comune=${city.value.id}`)
      .then((resp) => {
        zones.value = resp.data.data.frazioni_list.filter(
            (item) => item.frazione !== ""
        );
        zones.value = zones.value.map((item) => {
          return {
            id: item.id_frazione,
            title: item.frazione,
          };
        });
        if (zones.value.length) {
          zones.value.unshift({
            id: "",
            title: zone_label,
          });
        } else {
          zones.value = [
            {
              id: "",
              title: zone_label,
            },
          ];
        }
      })
      .catch((error) => {
        console.log(error, "error fetch comune");
      });
}

const contracts = ref([
  {
    id: "",
    title: "Tutti",
  },
  {
    id: 1,
    title: "Vendita",
  },
  {
    id: 2,
    title: "Affitto",
  },
]);
const contract = ref(contracts.value[0]);
watch(contract, () => {
  current_page.value = 1;
});
const typologies = ref([]);
const typology = ref(null);
watch(typology, () => {
  current_page.value = 1;
});

function fetchTypology(residenziale = 1) {
  axiosInstance
      .post(`/tipologie?residenziale=${residenziale}`)
      .then((resp) => {
        let temp = resp.data.data.tipologie_list;
        temp = temp.map((item) => {
          return {
            id: item.Id_tipologia,
            title: item.tipologie,
          };
        });
        temp.unshift({
          id: 0,
          title: "Tutti",
        });
        typologies.value = temp;
        typology.value = typologies.value[0];
      })
      .catch((error) => {
        console.log(error, "error fetch typology");
      });
}

const residentialeListValue = ref({id: 2, title: "Tutti"});
const rif = ref("");
const rooms = useRangeOfObjects({from: 0, to: 6});
rooms[0].id = "";
rooms[0].title = "Tutti";
const room = ref(rooms[0]);
watch(room, () => {
  current_page.value = 1;
});
const prices_min = prices_min_data;
const price_min = ref(prices_min[0]);
watch(price_min, (new_value) => {
  current_page.value = 1;
  if (price_max.value.id !== "" && price_max.value.id < new_value.id) {
    price_min.value = prices_min[0];
  }
});
const prices_max = prices_max_data;
const price_max = ref(prices_max[0]);
watch(price_max, (new_value) => {
  current_page.value = 1;
  if (price_min.value.id !== "" && price_min.value.id > new_value.id) {
    price_max.value = prices_max[prices_max.length - 1];
  }
});
const mq_min_list = mq_min_list_data;
const mq_min = ref(mq_min_list[0]);
watch(mq_min, (new_value) => {
  current_page.value = 1;
  if (mq_max.value.id !== "" && mq_max.value.id < new_value.id) {
    mq_min.value = mq_min_list[0];
  }
});
const mq_max_list = mq_max_list_data;
const mq_max = ref(mq_max_list[0]);
watch(mq_max, (new_value) => {
  current_page.value = 1;
  if (mq_min.value.id !== "" && mq_min.value.id > new_value.id) {
    mq_max.value = mq_max_list[mq_max_list.length - 1];
  }
});

watch(order_by, (new_value) => {
  current_page.value = 1;
});

function fetchFilteredData(
    pageParam = current_page.value,
) {
  loading.value = true;
  error.value = false;
  const params = {
    page: pageParam,
    id_comune: city.value.id,
    id_tipologia: typology.value.id,
    tipo_contratto: contract.value.id,
    numero_locali: room.value.id,
    riferimento: rif.value,
    mq_min: mq_min.value.id,
    mq_max: mq_max.value.id === 0 ? "" : mq_max.value.id,
    prezzo_min: price_min.value.id,
    prezzo_max: price_max.value.id === 0 ? "" : price_max.value.id,
    id_frazione: zone.value.id,
    order_by: order_by.value.id,
    items_per_page: items_per_page.value,
  };
  const urlParams = [];
  Object.entries(params).forEach(([key, value]) => {
    urlParams.push(`${key}=${value}`);
  });
  const url = "/immobili?" + urlParams.join("&");
  // console.log(url);
  axiosInstance
      .post(url, {
        credentials: "same-origin",
      })
      .then((resp) => {
        const resCount = resp.data.data.items;
        let count;
        pages_count.value = resp.data.data.pages;
        switch (true) {
          case resCount === 1:
            count = `${resCount} immobile`;
            break;
          case resCount > 1:
            count = `${resCount} immobili`;
            break;
        }
        default_count.value = count;
        current_page.value = +resp.data.data.current_page;
        filtered.value = resp.data.data.immobili_list;
        setTimeout(() => {
          loading.value = false;
          setTimeout(() => {
            real_estates.value.scrollIntoView({
              behavior: "smooth"
            });
          }, 200);
        }, 800);
      })
      .catch((error) => {
        console.log(error, "error fetch in filter");
        loading.value = false;
        error.value = "Si è verificato un errore. Riprova più tardi";
      });
}

function onSubmit() {
  fetchFilteredData();
}

function goToPage(index) {
  fetchFilteredData(index);
}

onMounted(() => {
  fetchCity();
  fetchTypology(1);
  setTimeout(() => {
    fetchFilteredData(1);
  }, 1000);
});
</script>
<template>
  <div class="main-app">
    <div class="container">
      <div class="main-app__container">
        <div class="main-app__filter filter">
          <div class="filter__body">
            <div class="filter__block">
              <div class="filter__item">
                <SelectComponent
                    tab-index="1"
                    :options="cities"
                    v-model:value="city"
                    label="Città"
                >
                </SelectComponent>
              </div>
              <div class="filter__item">
                <select-component
                    tab-index="2"
                    :options="zones"
                    v-model:value="zone"
                    label="Zona"
                    :disabled="zone_computed"
                >
                </select-component>
              </div>
              <div class="filter__item">
                <select-component
                    tab-index="3"
                    :options="contracts"
                    v-model:value="contract"
                    label="Contratto"
                >
                </select-component>
              </div>
              <div class="filter__item">
                <select-component
                    tab-index="4"
                    :options="typologies"
                    v-model:value="typology"
                    label="Tipologia"
                >
                </select-component>
              </div>
              <div class="filter__item">
                <InputComponent
                    label="ID Annuncio"
                    v-model:value="rif"
                    id="rif"
                />
              </div>
              <div class="filter__item">
                <select-component
                    tab-index="3"
                    :options="rooms"
                    v-model:value="room"
                    label="Num. Locali"
                >
                </select-component>
              </div>
              <div class="filter__item">
                <select-component
                    tab-index="3"
                    :options="prices_min"
                    v-model:value="price_min"
                    label="Prezzo Minimo"
                >
                </select-component>
              </div>
              <div class="filter__item">
                <select-component
                    tab-index="3"
                    :options="prices_max"
                    v-model:value="price_max"
                    label="Prezzo Massimo"
                >
                </select-component>
              </div>
              <div class="filter__item">
                <select-component
                    tab-index="3"
                    :options="mq_min_list"
                    v-model:value="mq_min"
                    label="Dimensioni Min (mq)"
                >
                </select-component>
              </div>
              <div class="filter__item">
                <select-component
                    tab-index="3"
                    :options="mq_max_list"
                    v-model:value="mq_max"
                    label="Dimensioni Max (mq)"
                >
                </select-component>
              </div>
              <div class="filter__item"></div>
              <div class="filter__item">
                <button @click.prevent="onSubmit" class="filter__btn">Cerca</button>
              </div>
            </div>
          </div>
        </div>

        <div v-if="loading" class="adds__loading">
          <LoadingComponent/>
        </div>

        <div v-else class="main-app__estates adds" ref="real_estates">
          <div class="main-app__header">
            <h2 v-if="!loading && !error" class="adds__title">
              <span v-if="filtered.length">
                Alcuni dei nostri immobili
                <span class="adds__stitle">({{ default_count }})</span>
              </span>
              <span v-else>
                Nessun immobile corrisponde ai criteri di ricerca impostati.<br/>
                Prova ad effettuare una nuova ricerca
              </span>
            </h2>
            <div class="filter__order">
              <select-component
                  tab-index="2"
                  :options="orders_by"
                  v-model:value="order_by"
                  label="Ordina per"
              >
              </select-component>
            </div>
          </div>
          <h2 v-if="error" class="adds__title">{{ error }}</h2>
          <div
              v-if="filtered.length && !loading && !error"
              class="adds__container"
          >
            <AddItem
                v-for="add in filtered"
                :key="add.id"
                :add="add"
                :site-url="site_url"
            />
          </div>
          <Paginate
              v-if="pages_count > 1"
              :current_page="current_page"
              :total_pages="pages_count"
              @update_current="goToPage"
          />
        </div>
      </div>
    </div>
  </div>
</template>
<style lang="scss">
.main-app {
  position: relative;
  &__filter {
    margin-bottom: 10rem;
  }
  &__header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
  }
  &__estates {
    &.adds {
      padding-top: 2rem;
      .adds__title {
        text-align: left;
      }
    }
  }
}
.filter {
  position: relative;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  max-width: 106.4rem;
  width: 100%;
  background: #ffffff;
  padding: 1.6rem;
  z-index: 100;
  &__body {
    display: flex;
    align-items: flex-start;
    box-shadow: 0 2px 8px rgba(0, 0, 0, .4);
    border-radius: 1.6rem;
    @media (max-width: 450px) {
      display: block;
    }
  }
  &__block {
    display: flex;
    flex-wrap: wrap;
    flex-grow: 1;
    border-top: 1px solid #f6f6f6;
    border-left: 1px solid #f6f6f6;
  }
  &__item {
    padding: 2rem 2rem;
    flex-basis: 25%;
    @media (max-width: 850px) {
      flex-basis: 50%;
    }
    @media (max-width: 570px) {
      flex-basis: 100%;
    }
  }
  &__btn {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    text-transform: uppercase;
    color: white;
    background: var(--accent);
    border-radius: 0.8rem;
    border: none;
    transition: all .4s;
    @media screen and (max-width: 850px) {
      height: 5rem;
    }
    &:hover {
      background: var(--accent-dark);
    }
  }
  &__more {
    width: 4.7rem;
    height: 4.7rem;
    border-radius: 50%;
    background-color: var(--accent);
    border: 1px solid var(--accent);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background-color 0.2s ease-out;
    margin-right: 0.5rem;
    @media (max-width: 700px) {
      width: 3.7rem;
      height: 3.7rem;
    }
    &:hover {
      background-color: var(--accent-light);
      svg {
        transform: scale(1.2);
        @media (max-width: 700px) {
          transform: scale(1.1);
        }
      }
    }
    svg {
      will-change: transform;
      transition: transform 0.3s ease-out;
      backface-visibility: hidden;
      @media (max-width: 700px) {
        transform: scale(0.9);
      }
    }
  }
  &__order {
    flex: 0 0 30rem;
    padding: 2rem 3.6rem;
    background: #ffffff;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
    border-radius: 16px;
    .select__header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .select__title {
      position: relative;
      margin-bottom: 0;
      margin-right: 0.4rem;
      &::after {
        content: ":";
      }
    }
    .select__selected span {
      font-size: 1.8rem;
      color: black;
    }
    .select__options {
      padding: 1rem;
    }
  }
}
.adds {
  padding: 12.8rem 0 8rem;
  @media (max-width: 950px) {
    padding: 8rem 0 7rem;
  }
  @media (max-width: 768px) {
    padding: 8rem 0 3rem;
  }
  @media (max-width: 450px) {
    padding: 5rem 0;
  }
  &__title {
    font-weight: 600;
    font-size: 4.8rem;
    line-height: lh(48, 58);
    color: #2c499c;
    margin-bottom: 6.4rem;
    text-align: center;
    @media (max-width: 650px) {
      font-size: 4.4rem;
    }
    @media (max-width: 500px) {
      font-size: 3.8rem;
    }
    @media (max-width: 450px) {
      margin-bottom: 4rem;
    }
    @media (max-width: 400px) {
      font-size: 3.2rem;
    }
  }
  &__stitle {
    font-size: 2rem;
    white-space: nowrap;
  }
  &__container {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -1.6rem;
    & > div {
      flex-basis: calc(50% - 3.2rem);
      margin: 0 1.6rem 3.2rem;
    }
    @media (max-width: 700px) {
      display: block;
    }
  }
  &__cta {
    padding-top: 2rem;
    text-align: center;
  }
}
</style>
