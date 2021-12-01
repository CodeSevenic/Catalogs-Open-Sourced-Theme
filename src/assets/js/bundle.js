import $ from 'jquery';
import './components/slider';
import './components/navigation';
import 'slick-carousel';
import './components/swiper';
import './components/custom_search';
import './components/store-slide';

// const content = new Content();

$(() => {
  $('.most_recent_widget').slick();

  if (wp.customize && wp.customize.selectiveRefresh) {
    wp.customize.selectiveRefresh.bind(
      'partial-content-rendered',
      (placement) => {
        console.log(placement);
        if (
          placement.partial.widgetIdParts &&
          placement.partial.widgetIdParts.idBase ===
            'catalogs_mst_recent_widget'
        ) {
          placement.container.find('.most_recent_widget').slick();
        }
      }
    );
  }
});
