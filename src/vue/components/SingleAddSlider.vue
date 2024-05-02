<template>
  <div class="single-add-slider">
    <carousel>
      <slide v-for="slide in foto_list"
             :key="slide.id">
        <div class="single-add-slider__item">
          <img :src="slide.nome"
               alt="">
        </div>
      </slide>
      <template #addons>
        <navigation />
      </template>
    </carousel>
  </div>
</template>

<script>
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'

export default {
  name: 'App',
  props: {
    foto_list: {
      type: Array,
      required: true,
    },
  },
  components: {
    Carousel,
    Slide,
    Pagination,
    Navigation,
  },
}
</script>
<style lang="scss">
.single-add-slider {
  .carousel__slide {
    position: relative;
    height: 78.4rem;
    img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  }
  .carousel__prev,
  .carousel__next {
    outline: 0 !important;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 6.4rem;
    height: 6.4rem;
    border-radius: 50%;
    border: 1px solid #2c499c;
    background: #2c499c;
    opacity: 1 !important;
    transition: all .3s ease-out;
    svg {
      fill: white;
    }
  }
}
</style>