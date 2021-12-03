<?php get_header();
$banners = get_field('store_banner_image', get_the_ID());

$image = get_field('poster_image', get_the_ID())['sizes']['catalog-image'];

$catalog_content = get_field('catalog_content', get_the_ID());
// var_dump($banners)
?>

<section class="section-container">
  <!-- banner image -->
  <?php if ($banners) { ?><div class="store_banner">
      <div class="swiper-wrapper">
        <?php
        if ($banners) : ?>
          <?php foreach ($banners as $banner) { ?>
            <a class="swiper-slide" href="">
              <img src="<?php echo $banner['url'] ?>" alt="">
            </a>
          <?php }; ?>
        <?php endif;
        ?>
      </div>
    </div>
  <?php } ?>
  <div>
    <h3>Latest Specials</h3>
  </div>
  <div class="store-wrapper">

    <div class="store-catalogs">
      <ul class="swiper-wrapper" style="display: flex; list-style: none; margin: 0;">
        <?php
        if ($catalog_content) { ?>
          <?php foreach ($catalog_content as $catalog_image) {
          ?>
            <li class="li-brochu swiper-slide card-size">
              <article class="catalog ga-brochure-catalog">
                <div class="catalog-cover">
                  <a class="catalog-anchor" href="https://allcatalogues.co.za/johannesburg/game">
                    <div class="catalog-image">
                      <div class="catalog-border">
                        <img src="<?php echo $catalog_image['catalog_image']['url']; ?>" alt="">

                        <div class="catalog-mask"> <span class="button button-bold button-primary">View Catalog</span> </div>
                      </div>
                    </div>
                  </a>
                </div>
                <header class="catalog-header">
                  <span class="catalog-date">
                    <?php echo get_field('start_date') ?> - <?php echo get_field('end_date') ?> </span>
                  <h4 class="catalog-title"><?php echo $catalog_image['catalog_title'] ?></h4>
                </header>
                <?php
                if (get_field('store_logo')) { ?>
                  <div class="catalog-logo"> <a href="<?php echo get_post_type_archive_link('store') ?>" class="city_slider-logo-link ">
                      <img src="<?php echo get_field('store_logo')['sizes']['catalog-logo'] ?>" alt="">
                    </a> </div> <?php } else { ?>
                  <div class="catalog-website">
                    <a href="" target="_blank"><?php the_title() ?></a>
                  </div>
                <?php }
                ?>
              </article>
            </li>
        <?php
          };
        };
        reset($catalog_content)
        ?>
      </ul>
      <div class="swiper-pagination pagination-pos"></div>
    </div>
  </div>

  </div>


</section>

<?php get_footer(); ?>