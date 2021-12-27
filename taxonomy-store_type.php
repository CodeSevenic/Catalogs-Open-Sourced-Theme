<?php get_header();

$term_id = get_queried_object_id();
$term_name = get_queried_object()->name;
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
$tax_posts = get_posts($tax_args);
// var_dump($tax_posts);

$args = [
  'post_per_page' => 10,
  'post_type' => 'store',
];

$post_query = new WP_Query($tax_args);

// var_dump($post_query);

$banner_args = [
  'post_per_page',
  'post_type' => 'banner'
];
$banner_query = new WP_Query($banner_args);



?>

<section class="section-container">
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
  ?>
  <h1 class="font-semibold text-xl lg:text-2xl my-4 px-[5%] text-center md:text-left">Magazines, specials, deals and catalogues from category: <span class="text-sky-800"><?php echo $term_name ?></span>
  </h1>
  <hr class="py-3  border-sky-500 mx-auto w-[80%] md:w-[95%]">
  <div class="main-catalogs">
    <!-- <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div> -->
    <ul class="categories-catalogs">
      <?php
      while ($post_query->have_posts()) {

        $post_query->the_post();

        if (get_field('poster_image', get_the_ID())) {
          $image = get_field('poster_image', get_the_ID())['sizes']['catalog-image'];
        }
      ?>
        <li class="category-card">
          <article class="catalog ga-brochure-catalog">
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
          </article>
        </li>
      <?php   }
      wp_reset_postdata();
      ?>
    </ul>
    <div class="swiper-pagination main-pagination"></div>
  </div>

</section>

<?php get_footer(); ?>