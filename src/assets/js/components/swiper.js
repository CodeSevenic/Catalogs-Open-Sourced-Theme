import Swiper, { Navigation, Pagination, Autoplay } from 'swiper';

Swiper.use([Navigation, Pagination, Autoplay]);
// init Swiper:
export const logoSlider = new Swiper('.swiper-container', {
  loop: true,
  roundLengths: true,
  centeredSlides: true,
  // Responsive breakpoints
  breakpoints: {
    // when window width is >= 320px
    320: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    // when window width is >= 480px
    480: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
    // when window width is >= 640px
    640: {
      slidesPerView: 4,
      spaceBetween: 10,
    },

    1200: {
      slidesPerView: 6,
      spaceBetween: 20,
    },
  },
  // Auto play
  // autoplay: {
  //   delay: 2000,
  // },
  // Navigation arrows
  navigation: {
    nextEl: '.logo-swiper-button-next',
    prevEl: '.logo-swiper-button-prev',
  },
});
