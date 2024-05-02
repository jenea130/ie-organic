<template>
    <div :class="{ 'is-active': is_active }" class="search" id="js-search">
        <input
            type="text"
            v-model="search"
            @input="onInput"
            placeholder="Cerca nel catalogo"
        />
        <div @click="toggleIsActive" class="search__btn" id="js-search-btn">
            <svg
                width="48"
                height="48"
                viewBox="0 0 48 48"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M0 26C0 11.6406 11.6406 0 26 0H48V22C48 36.3594 36.3594 48 22 48H0V26Z"
                    fill="#20BD60"
                />
                <path
                    d="M22.875 30.75C27.2242 30.75 30.75 27.2242 30.75 22.875C30.75 18.5258 27.2242 15 22.875 15C18.5258 15 15 18.5258 15 22.875C15 27.2242 18.5258 30.75 22.875 30.75Z"
                    stroke="white"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
                <path
                    d="M28.4434 28.4438L32.9996 33"
                    stroke="white"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
        </div>
        <ul v-if="pages.length" class="search-dropdown">
            <li v-for="item in pages" :key="item.id">
                <img :src="item.img" :width="50" alt="" />
                <a :href="`/page/${item.slug}`">{{ item.title }}</a>
            </li>
        </ul>
    </div>
</template>

<script>
import { axiosInstance } from "../utils/axios-instances";

export default {
    name: "MainSearch",
    components: {},
    props: {
        siteUrl: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            is_active: false,
            pages: [],
            search: "",
        };
    },
    methods: {
        toggleIsActive() {
            if (window.innerWidth < 576) {
                this.is_active = !this.is_active;
            }
        },
        onInput() {
            if (this.search === "") {
                setTimeout(() => {
                    this.pages = [];
                }, 600);
            } else {
                this.getProducts();
            }
        },
        getProducts() {
            axiosInstance
                .get("/page/v1/search?title=" + this.search)
                .then((response) => {
                    this.pages = response.data.pages;
                    // console.log(JSON.stringify(this.pages, null, 4));
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
    computed: {},
};
</script>
