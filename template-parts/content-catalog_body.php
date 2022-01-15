<!-- <section class=""> -->
<?php
// Get All Taxonomies
$tax = get_terms(array(
  'taxonomy' => 'store_type',
  'hide_empty' => false
));

// Get all posts of the specified taxonomy
$tax_args = [
  'post_type' => 'store',
  'posts_per_page' => -1,
  'tax_query' => [
    [
      'taxonomy' => 'store_type',
      'field' => 'slug',
      'terms' => 'Electronics'
    ]
  ]
];
$tax_posts = get_posts($tax_args);

$args = [
  'posts_per_page' => -1,
  'post_type' => 'store',
];



$post_query = new WP_Query($args);
$banner_args = [
  'post_per_page',
  'post_type' => 'banner'
];
$banner_query = new WP_Query($banner_args);
?>
<section class="section-container container mx-auto pb-10">
  <?php
  while ($banner_query->have_posts()) {
    $banner_query->the_post();
    $banner_image = get_field('banner_image');
    if ($banner_image) { ?><div class="store_banner">
        <div class="swiper-wrapper">
          <?php
          if ($banner_image) : ?>
            <?php foreach ($banner_image as $banner) { ?>
              <a class="swiper-slide" href="">
                <img src="<?php echo $banner['url'] ?>" alt="">
              </a>
            <?php }; ?>
          <?php endif;
          ?>
        </div>
      </div>
  <?php }
  }
  wp_reset_postdata();
  ?>
  <h1 class="font-semibold text-xl lg:text-2xl my-4 px-[5%] text-center md:text-left">Discover latest <span class="text-sky-700">specials</span>, <span class="text-sky-600">deals</span>, <span class="text-sky-500">magazines</span> and <span class="text-sky-800">catalogues</span>
  </h1>
  <hr class="py-3  border-sky-500 mx-auto w-[80%] md:w-[95%]">

  <div class="catalogs-frame relative">
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <div class="main-catalogs">
      <ul class="swiper-wrapper">
        <?php
        while ($post_query->have_posts()) {

          $post_query->the_post();

          if (get_field('poster_image', get_the_ID())) {
            $image = get_field('poster_image', get_the_ID())['sizes']['catalog-image'];
          }
        ?>
          <li class="li-brochu swiper-slide">

            <article class="cover">
              <div class="catalog ga-brochure-catalog">
                <div class="catalog-cover">
                  <a class="catalog-anchor" href="<?php the_permalink(); ?>">
                    <div class="catalog-image">
                      <div class="catalog-border">
                        <img src="<?php if ($image) echo $image ?>" alt="Catalogue Game Johannesburg">
                        <div class="catalog-mask"> <span class="button button-bold button-primary">View Catalog</span> </div>
                      </div>
                    </div>
                  </a>
                </div>
                <header class="catalog-header">
                  <span class="catalog-date">
                    <?php echo get_field('start_date') ?> - <?php echo get_field('end_date') ?> </span>
                  <?php if (get_field('cover_title')) { ?>
                    <h4 class="catalog-title"><?php echo get_field('cover_title') ?></h4>
                  <?php } ?>
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
              </div>
            </article>
          </li>
        <?php   }
        wp_reset_postdata();
        ?>
      </ul>
      <div class="swiper-pagination main-pagination"></div>
    </div>
  </div>
  <!-- /////////////////////////////////////////////////////////// -->
  <hr class="py-3  border-sky-500 mx-auto w-[80%] md:w-[95%]">
  <!-- All stores catalogs -->
  <h1 class="font-semibold text-xl lg:text-2xl my-4 px-[5%] text-center md:text-left">Discover latest <span class="text-sky-700">specials</span>, <span class="text-sky-600">deals</span>, <span class="text-sky-500">magazines</span> and <span class="text-sky-800">catalogues</span>
  </h1>
  <hr class="py-3  border-sky-500 mx-auto w-[80%] md:w-[95%]">

  <div class="container mx-auto">
    <ul class="categories-catalogs-sm">
      <?php
      $product_args = [
        'post_type' => 'store',
        'posts_per_page' => 6,
      ];

      $product_query = new WP_Query($product_args);
      while ($product_query->have_posts()) {

        $product_query->the_post();

        $catalog_content = get_field('catalog_content');
        foreach ($catalog_content as $content) {
      ?>
          <li class="category-card-sm">
            <article class="catalog">
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
      wp_reset_query();
      ?>
    </ul>
  </div>
  <div class="flex justify-center py-6">
    <a href="<?php echo esc_url(home_url('/catalogs/page/2')); ?>">
      <button class="bg-sky-700 px-4 py-2  text-white button-spikes">View More</button>
    </a>
  </div>

</section>
<!-- </section> -->