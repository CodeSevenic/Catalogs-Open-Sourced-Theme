import Swiper, { Navigation, Pagination, Autoplay, EffectFade } from 'swiper';

Swiper.use([Navigation, Pagination, Autoplay, EffectFade]);
// init Swiper:

export const storeBanner = new Swiper('.store_banner', {
  loop: true,
  effect: 'fade',
  slidesPerView: 1,
  roundLengths: true,
  centeredSlides: true,
  // Auto play
  autoplay: {
    delay: 3000,
  },
  // Navigation arrows
  // navigation: {
  //   nextEl: '.swiper-button-next',
  //   prevEl: '.swiper-button-prev',
  // },
});

export const storeCatalogs = new Swiper('.store-catalogs', {
  slidesPerView: 1,
  spaceBetween: 20,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
      // spaceBetween: 10,
    },
    575: {
      slidesPerView: 2,
      // spaceBetween: 20,
    },
    820: {
      slidesPerView: 3,
      // spaceBetween: 40,
    },
    1200: {
      slidesPerView: 4,
      // spaceBetween: 50,
    },
  },
  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});
