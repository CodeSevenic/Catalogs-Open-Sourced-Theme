<section class="city_slider-section">

  <div class="city_slider">
    <div class="logo-swiper-button-prev btn-style" tabindex="0" role="button" aria-label="Previous slide"> <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="18.804px" height="33.814px" viewBox="0 0 18.804 33.814" enable-background="new 0 0 18.804 33.814" xml:space="preserve">
        <g>
          <path fill="#0E5891" d="M17.256,0.349c0.26,0,0.52,0.101,0.715,0.301c0.386,0.395,0.378,1.028-0.017,1.414L2.681,16.98 l15.572,14.619c0.402,0.378,0.422,1.011,0.044,1.414c-0.379,0.403-1.012,0.422-1.414,0.044L0.551,17.723 c-0.199-0.187-0.313-0.446-0.315-0.719c-0.002-0.272,0.106-0.535,0.301-0.725L16.558,0.633C16.751,0.443,17.003,0.349,17.256,0.349 z"></path>
        </g>
      </svg> </div>
    <div class="swiper-container swiper-container-horizontal">

      <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-1100px, 0px, 0px);">
        <?php
        // Query posts by Taxonomy
        $term_id = get_queried_object_id();
        $tax_args = [
          'fields' => 'ids',
          'post_type' => 'store',
          'posts_per_page' => -1,
          'tax_query' => [
            [
              'taxonomy' => 'store_type',
              'field' => 'term_id',
              'terms' => $term_id
            ]
          ]
        ];

        // Query all store posts
        $args = [
          'post_per_page' => -1,
          'post_type' => 'store',
        ];

        $post_query;

        if (term_exists($term_id, 'store_type')) {
          $post_query = new WP_Query($tax_args);
        } else {
          $post_query = new WP_Query($args);
        }

        while ($post_query->have_posts()) {
          $post_query->the_post();

          if (get_field('poster_image', get_the_ID())) {
            $content = get_field('poster_image', get_the_ID())['sizes']['catalog-image'];
          }

          if (get_field('store_logo')) { ?>
            <div class="swiper-slide box-settings ">
              <div class="city_slider-logo" style="background-image: url(<?php echo get_field('store_logo')['sizes']['catalog-logo'] ?>);"> <a target="_self" href="<?php the_permalink() ?>" class="city_slider-logo-link " title="<?php the_title() ?>"></a> </div>
            </div>

          <?php }
          ?>
        <?php
        }
        wp_reset_postdata();
        ?>


      </div> <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
    </div>
    <div class="logo-swiper-button-next btn-style" tabindex="0" role="button" aria-label="Next slide"> <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="18.833px" height="33.678px" viewBox="0 0.699 18.833 33.678" enable-background="new 0 0.699 18.833 33.678" xml:space="preserve">
        <g>
          <path fill="#0E5891" d="M1.563,34.028c-0.26,0-0.52-0.101-0.715-0.301c-0.386-0.395-0.378-1.028,0.017-1.414l15.274-14.916 L0.565,2.778C0.163,2.4,0.143,1.767,0.521,1.364C0.9,0.96,1.533,0.942,1.936,1.32l16.333,15.333 c0.199,0.187,0.313,0.446,0.315,0.719c0.002,0.272-0.106,0.535-0.301,0.725L2.26,33.743C2.066,33.933,1.814,34.028,1.563,34.028z"></path>
        </g>
      </svg> </div>
  </div>
</section>