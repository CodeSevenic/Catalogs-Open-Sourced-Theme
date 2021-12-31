<?php get_header() ?>
<section class="container mx-auto">
  <!-- /////////////////////////////////////////////////////////// -->
  <hr class="py-3  border-sky-500 mx-auto w-[80%] md:w-[95%]">
  <!-- All stores catalogs -->
  <h1 class="font-semibold text-xl lg:text-2xl my-4 px-[5%] text-center md:text-left">Discover latest <span class="text-sky-700">specials</span>, <span class="text-sky-600">deals</span>, <span class="text-sky-500">magazines</span> and <span class="text-sky-800">catalogues</span>
  </h1>
  <hr class="py-3  border-sky-500 mx-auto w-[80%] md:w-[95%]">

  <div class="">
    <ul class="categories-catalogs-sm">
      <?php


      if (get_query_var('paged')) {
        $paged = get_query_var('paged');
      } elseif (get_query_var('page')) {
        $paged = get_query_var('page');
      } else {
        $paged = 1;
      }
      // var_dump($paged);
      $product_args = [
        'post_type' => 'store',
        'posts_per_page' => 5,
        'paged' => $paged,
      ];



      $product_query = new WP_Query($product_args);
      while ($product_query->have_posts()) {

        $product_query->the_post();

        $catalog_content = get_field('catalog_content');
        foreach ($catalog_content as $content) {
      ?>
          <li class="category-card-sm">
            <article class="catalog ga-brochure-catalog">
              <div class="catalog-cover">
                <a class="catalog-anchor" href="<?php the_permalink(); ?>">
                  <div class="catalog-image-sm">
                    <div class="catalog-border">
                      <img src="<?php echo $content['catalog_image']['sizes']['catalog-image'];  ?>" alt="Catalogue Game Johannesburg">
                      <div class="catalog-mask"> <span class="button button-bold button-primary">View Catalog</span> </div>
                    </div>
                  </div>
                </a>
              </div>
              <header class="catalog-header-sm">
                <span class="catalog-date-sm">
                  <?php echo $content['start_duration'] ?> - <?php echo $content['end_duration'] ?> </span>
                <?php if ($content['catalog_title']) { ?>
                  <h4 class="catalog-title-sm"><?php echo $content['catalog_title'] ?></h4>
                <?php } ?>
              </header>
              <?php
              if (get_field('store_logo')) { ?>
                <div class="catalog-logo-sm"> <a href="<?php the_permalink() ?>" class="city_slider-logo-link ">
                    <img src="<?php echo get_field('store_logo')['sizes']['catalog-logo'] ?>" alt="">
                  </a> </div> <?php } else { ?>
                <div class="catalog-website">
                  <a href="<?php the_permalink() ?>" target="_blank"><?php the_title() ?></a>
                </div>
              <?php }
              ?>
            </article>
          </li>
      <?php }
      }
      ?>
    </ul>
    <div class="flex justify-center py-6 navigation-buttons">
      <?php echo paginate_links(array('total' => intval($product_query->max_num_pages))); ?>
    </div>

  </div>
</section>
<?php get_footer() ?>