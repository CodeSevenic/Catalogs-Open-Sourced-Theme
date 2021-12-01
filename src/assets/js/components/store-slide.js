import Swiper, { Navigation, Pagination, Autoplay } from 'swiper';

Swiper.use([Navigation, Pagination, Autoplay]);
// init Swiper:

const storeBanner = new Swiper('.store_banner', {
  loop: true,
  slidesPerView: 1,
  roundLengths: true,
  centeredSlides: true,
  // Auto play
  autoplay: {
    delay: 2000,
  },
  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

const storeCatalogs = new Swiper('.store-catalogs', {
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
