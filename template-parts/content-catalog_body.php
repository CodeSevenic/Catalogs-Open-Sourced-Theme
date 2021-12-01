<!-- <section class=""> -->
<?php

$args = [
  'post_per_page' => 10,
  'post_type' => 'store',
];

$post_query = new WP_Query($args);
?>
<section class="section-container">
  <ul class="list flex-division">
    <?php
    while ($post_query->have_posts()) {
      $post_query->the_post();
      $image = get_field('poster_image', get_the_ID())['sizes']['catalog-image'];
    ?>
      <li class="list-item li-brochu">
        <article class="catalog ga-brochure-catalog">
          <div class="catalog-cover">
            <a class="catalog-anchor" href="<?php the_permalink(); ?>">
              <div class="catalog-image">
                <div class="catalog-border">
                  <img src="<?php echo $image ?>" alt="Catalogue Game Johannesburg">
                  <div class="catalog-mask"> <span class="button button-bold button-primary">View Catalog</span> </div>
                </div>
              </div>
            </a>
          </div>
          <header class="catalog-header">
            <span class="catalog-date">
              <?php echo get_field('start_date') ?> - <?php echo get_field('end_date') ?> </span>
          </header>
          <?php
          if (get_field('store_logo')) { ?>
            <div class="catalog-logo"> <a href="<?php the_permalink() ?>" class="city_slider-logo-link ">
                <img src="<?php echo get_field('store_logo')['sizes']['catalog-logo'] ?>" alt="">
              </a> </div> <?php } else { ?>
            <div class="catalog-website">
              <a href="<?php the_permalink() ?>" target="_blank"><?php the_title() ?></a>
            </div>
          <?php }
          ?>
        </article>
      </li>
    <?php   }
    wp_reset_postdata();
    ?>
  </ul>
  <div class="content-block view-all-brochures" align="center"> <button onclick="gaStats.trackStatsEvents(this);" data-content=".column-main-five-rows .list-for-5-no-left-banner" data-page="1" data-max="15" data-url="johannesburg" class="button button-primary btn_flex-wrap__button pagination-btn ga-btn-brochures-see-more">See more</button> </div>
</section>
<!-- </section> -->