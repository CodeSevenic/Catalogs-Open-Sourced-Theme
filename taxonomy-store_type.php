<?php get_header();

$term_name = get_queried_object()->name;
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

$args = [
  'posts_per_page' => -1,
  'post_type' => 'store',
];

$post_query = new WP_Query($tax_args);
?>

<section class="section-container container mx-auto">

  <h1 class="font-semibold text-xl lg:text-2xl my-4 px-[5%] text-center md:text-left">Magazines, specials, deals and catalogues from category: <span class="text-sky-800"><?php echo $term_name ?></span>
  </h1>
  <hr class="py-3  border-sky-500 mx-auto w-[80%] md:w-[95%]">
  <div class="mx-auto px-[5%]">
    <?php while ($post_query->have_posts()) {
      $post_query->the_post();
      $logos = get_field('store_logo')['sizes']['catalog-logo']; ?>
      <a class="" href="<?php the_permalink() ?>">
        <img class="inline w-20 p-1 hover:brightness-125" src="<?php echo $logos ?>" alt="<?php the_title() ?>">
      </a>
    <?php }
    wp_reset_postdata();
    ?>
  </div>
  <div class="main-catalogs">
    <ul class="categories-catalogs-sm">
      <?php
      while ($post_query->have_posts()) {

        $post_query->the_post();

        if (get_field('poster_image', get_the_ID())) {
          $image = get_field('poster_image', get_the_ID())['sizes']['catalog-image'];
        }
      ?>
        <li class="category-card-sm">
          <article class="catalog">
            <div class="catalog-cover">
              <a class="catalog-anchor" href="<?php the_permalink(); ?>">
                <div class="catalog-image-sm">
                  <div class="catalog-border">
                    <img src="<?php if ($image) echo $image ?>" alt="Catalogue Game Johannesburg">
                    <div class="catalog-mask"> <span class="button button-bold button-primary">View Catalog</span> </div>
                  </div>
                </div>
              </a>
            </div>
            <header class="catalog-header-sm">
              <span class="catalog-date-sm">
                <?php echo get_field('start_date') ?> - <?php echo get_field('end_date') ?> </span>
              <?php if (get_field('cover_title')) { ?>
                <h4 class="catalog-title-sm"><?php echo get_field('cover_title') ?></h4>
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
      <?php   }
      wp_reset_postdata();
      ?>
    </ul>
    <div class="swiper-pagination main-pagination"></div>
  </div>

</section>

<?php get_footer(); ?>