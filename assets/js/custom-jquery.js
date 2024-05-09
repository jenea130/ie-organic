jQuery(document).ready(function ($) {
  $('.customer__slider').slick({
    slidesToShow: 1,
    autoplay: false,
    variableWidth: false,
    slidesToScroll: 1,
    infinite: true,
    arrows: false,
    dots: true,
    speed: 500,
    useTransform: true,
    responsive: [
      // {
      //   breakpoint: 1400,
      //   settings: {
      //     slidesToShow: 3,
      //     slidesToScroll: 3
      //   }
      // },
      // {
      //   breakpoint: 1200,
      //   settings: {
      //     slidesToShow: 2,
      //     slidesToScroll: 2
      //   }
      // },
      // {
      //   breakpoint: 768,
      //   settings: {
      //     slidesToShow: 1,
      //     slidesToScroll: 1,
      //     adaptiveHeight: true
      //   }
      // }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });


  // add id to tag a js-referrer
  const js_referrer = document.querySelector('#js-referrer');
  const expectedReferral = "https://bludelego.it";
  const referringURL = document.referrer;
  console.log(referringURL, "referringURL");

  if (referringURL.indexOf(expectedReferral) !== -1) {
    const img = `<img src="https://bludelego.it/downloads/color-bludelego.svg" alt="">`;
    js_referrer.innerHTML = '';
    js_referrer.setAttribute('href', expectedReferral);
    js_referrer.insertAdjacentHTML('afterbegin', img);
  }
});
