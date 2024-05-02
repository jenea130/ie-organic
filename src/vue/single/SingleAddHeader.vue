<script setup>
const props = defineProps({
  code: {
    type: String,
    required: true
  },
  title: {
    type: String,
    required: true
  },
  price: {
    type: String,
    required: true
  },
  contract: {
    type: String,
    required: true
  },
});

function clearPrice(price) {
  Number.prototype.format = function (n, x, s, c) {
    let re = "\\d(?=(\\d{" + (x || 3) + "})+" + (n > 0 ? "\\D" : "$") + ")",
        num = this.toFixed(Math.max(0, ~~n));
    return (c ? num.replace(".", c) : num).replace(
        new RegExp(re, "g"),
        "$&" + (s || ",")
    );
  };

  const myString = Number(price.replace(/\D/g, ""));
  return '€ ' + myString.format(-3, 3, ".", ","); // "12.345.678,90"
}
</script>
<template>
  <div class="single-add__header">
    <div class="single-add__rif">Riferimento <span>{{ code }}</span></div>
    <h1 class="single-add__title">{{ title }}</h1>
    <div class="single-add__header-b">
      <span class="single-add__contract">{{ contract }}</span>
      <span class="single-add__price">{{ clearPrice(price) }}</span>
    </div>
    <a class="single-add__printer" href="#">
      <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
        <path d="M8 10V5H24V10" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M24 19H8V27.5H24V19Z" stroke="black" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round"/>
        <path d="M8 22H3.5V12C3.5 10.9 4.475 10 5.6625 10H26.3375C27.525 10 28.5 10.9 28.5 12V22H24"
              stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path
            d="M23.5 16C24.3284 16 25 15.3284 25 14.5C25 13.6716 24.3284 13 23.5 13C22.6716 13 22 13.6716 22 14.5C22 15.3284 22.6716 16 23.5 16Z"
            fill="black"/>
      </svg>
    </a>
  </div>
</template>
