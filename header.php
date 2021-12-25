<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Link Swiper's CSS -->
  <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> -->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <a class="u-skip-link hidden" href="#content"><?php esc_attr_e('Skip to content', 'catalogs'); ?></a>
  <!-- Header Start Here -->
  <header role="banner" class="main-header">
    <?php echo get_template_part('template-parts/content-brand_slider') ?>
    <div class="c-header bg-sky-800">
      <div class="container mx-auto pt-2 px-1 sm:px-5 flex justify-between">
        <div class="text-white">
          <?php
          if (has_custom_logo()) {
            the_custom_logo();
          } else { ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="c-header__blogname"><?php esc_html(bloginfo('name')); ?></a>
          <?php } ?>
        </div>
        <?php get_search_form(true);
        ?>

      </div>
      <?php get_template_part('template-parts/navbar')
      ?>
      <div class="c-navigation">
        <div class="o-container">
          <nav class="header-nav" role="navigation" aria-label="<?php esc_html_e('Main Navigation', 'catalogs') ?>">
            <?php //wp_nav_menu(array('theme_location' => 'main-menu'))
            ?>
          </nav>
          <?php // wp_nav_menu(array('theme_location' => 'main-menu')) 
          ?>
        </div>
      </div>
    </div>
  </header>
  <!-- Header Ends Here -->
  <div id="content">