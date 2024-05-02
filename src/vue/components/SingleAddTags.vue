<script setup>
const props = defineProps({
  totale_mq: {
    type: [Number, String],
    required: true,
  },
  locali: {
    type: Number,
    required: true,
  },
  bagni: {
    type: Number,
    required: true,
  },
});
</script>
<template>
  <div class="single-add__tags">
    <div v-if="totale_mq" class="single-add__tag-item">
      <div class="single-add__tag-svg">
        <svg width="21" height="20" viewBox="0 0 21 20" fill="none">
          <path
              d="M17.084 3.125H4.58398C4.23881 3.125 3.95898 3.40482 3.95898 3.75V16.25C3.95898 16.5952 4.23881 16.875 4.58398 16.875H17.084C17.4292 16.875 17.709 16.5952 17.709 16.25V3.75C17.709 3.40482 17.4292 3.125 17.084 3.125Z"
              stroke="#1A2746" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
          <path
              d="M14.8737 12.3722H14.7237H10.2976H10.1476V12.2222V11.2935V11.2294L10.1939 11.1851L12.7598 8.72992L12.7605 8.7292L12.7605 8.7292C13.1486 8.36308 13.3275 7.98635 13.3275 7.59692C13.3275 7.32386 13.2445 7.11997 13.0889 6.9689C12.933 6.81754 12.7199 6.73543 12.4328 6.73543C12.1142 6.73543 11.8984 6.82692 11.7575 6.9877C11.6106 7.15548 11.5301 7.38211 11.529 7.68224L11.5558 7.97879L11.5706 8.14232H11.4064H10.2976H10.1662L10.1489 8.01208C10.1356 7.91188 10.1293 7.79773 10.1293 7.67048C10.1293 7.00546 10.3365 6.45599 10.7604 6.03734L14.8737 12.3722ZM14.8737 12.3722V12.2222M14.8737 12.3722V12.2222M14.8737 12.2222V11.1923V11.0423H14.7237H12.2229L13.595 9.82437C13.595 9.82433 13.5951 9.82429 13.5951 9.82424C14.006 9.46196 14.3046 9.10758 14.4813 8.76009C14.6649 8.4108 14.7546 8.01254 14.7546 7.56933C14.7546 6.93846 14.5456 6.41362 14.1222 6.00847M14.8737 12.2222L14.1222 6.00847M14.1222 6.00847C13.7028 5.60115 13.1333 5.40554 12.4328 5.40554C11.7526 5.40554 11.19 5.61281 10.7604 6.03733L14.1222 6.00847Z"
              fill="#1A2746" stroke="#1A2746" stroke-width="0.3"></path>
        </svg>
      </div>
      <div class="single-add__tag-value"> {{ totale_mq}}m<sup>2</sup></div>
    </div>
    <div v-if="locali" class="single-add__tag-item">
      <div class="single-add__tag-svg">
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
      <div class="single-add__tag-value">
        <span>Locali</span> {{ locali}}
      </div>
    </div>
    <div v-if="bagni" class="single-add__tag-item">
      <div class="single-add__tag-svg">
        <svg width="21" height="20" viewBox="0 0 21 20" fill="none">
          <path d="M6.29297 15V16.875" stroke="#1A2746" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round"></path>
          <path d="M15.043 15V16.875" stroke="#1A2746" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round"></path>
          <path
              d="M5.04297 8.125V4.0625C5.04297 3.6481 5.20759 3.25067 5.50061 2.95765C5.79364 2.66462 6.19107 2.5 6.60547 2.5C7.01987 2.5 7.4173 2.66462 7.71032 2.95765C8.00335 3.25067 8.16797 3.6481 8.16797 4.0625"
              stroke="#1A2746" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
          <path d="M16.293 7.5H11.293V11.25H16.293V7.5Z" stroke="#1A2746" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round"></path>
          <path
              d="M16.293 8.125H18.793C18.9587 8.125 19.1177 8.19085 19.2349 8.30806C19.3521 8.42527 19.418 8.58424 19.418 8.75V11.25C19.418 12.2446 19.0229 13.1984 18.3196 13.9017C17.6164 14.6049 16.6625 15 15.668 15H5.66797C4.67341 15 3.71958 14.6049 3.01632 13.9017C2.31306 13.1984 1.91797 12.2446 1.91797 11.25V8.75C1.91797 8.58424 1.98382 8.42527 2.10103 8.30806C2.21824 8.19085 2.37721 8.125 2.54297 8.125H11.293"
              stroke="#1A2746" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </div>
      <div class="single-add__tag-value">
        <span>Bagni</span> {{ bagni}}
      </div>
    </div>
  </div>
</template>

