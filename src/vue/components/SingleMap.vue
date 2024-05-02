<script setup>
import "leaflet/dist/leaflet.css";
import {LMap, LTileLayer, LMarker, LIcon} from "@vue-leaflet/vue-leaflet";
import {ref} from "@vue/reactivity";
import {onMounted} from "vue";
import {site_url} from "../utils/helpers";

const props = defineProps({
  lat: {
    type: Number,
    required: true,
  },
  lng: {
    type: Number,
    required: true,
  },
});
const iconUrl = `${site_url}/wp-content/themes/bs-base-vite/assets/i/static/map-icon.png`;
const iconSize = [32, 32];

const zoom = ref(17);
onMounted(() => {
  console.log(props.lng, 'props.lng')
  console.log(props.lat, 'props.lat')
})
</script>
<template>
  <div class="single-add__map">
    <div style="height:600px; width:800px">
      <l-map ref="map" v-model:zoom="zoom" :center="[lat, lng]">
        <l-marker :lat-lng="[lat,lng]">
          <l-icon :icon-url="iconUrl" :icon-size="iconSize"/>
        </l-marker>
        <l-tile-layer
            url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
            layer-type="base"
            name="OpenStreetMap"
        ></l-tile-layer>
      </l-map>
    </div>
  </div>
</template>

