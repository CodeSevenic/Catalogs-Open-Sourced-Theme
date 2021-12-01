<?php

function catalogs_assets()
{
  // Main CSS styles
  wp_enqueue_style('catalogs-stylesheet', get_template_directory_uri() . '/dist/assets/css/bundle.css', array(), '1.0.0', 'all');
  // Witbank Catalog CSS styles
  wp_enqueue_style('witbank-catalog-stylesheet', get_template_directory_uri() . '/witbank-catalog.css', array(), '1.0.0', 'all');
  // Brand Swiper CSS styles
  wp_enqueue_style('brand_slider-stylesheet', get_template_directory_uri() . '/brand_slider.css', array(), '1.0.0', 'all');
  // Brand Swiper CSS styles
  wp_enqueue_style('catalog_body-stylesheet', get_template_directory_uri() . '/witbank-catalog-body.css', array(), '1.0.0', 'all');
  // Navbar Styles
  wp_enqueue_style('catalog_navbar-stylesheet', get_template_directory_uri() . '/witbank-catalog-navbar.css', array(), '1.0.0', 'all');

  include(get_template_directory() . '/lib/inline-css.php');
  wp_add_inline_style('catalogs-stylesheet', $inline_styles);

  wp_enqueue_script('catalogs-scripts', get_template_directory_uri() . '/dist/assets/js/bundle.js', array('jquery'), '1.0.0', true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}

add_action('enqueue_block_editor_assets', 'catalogs_block_editor_assets');

function catalogs_block_editor_assets()
{
  wp_enqueue_style('catalogs-block-editor-styles', get_template_directory_uri() . '/dist/assets/css/editor.css', array(), '1.0.0', 'all');
}

add_action('wp_enqueue_scripts', 'catalogs_assets');

function catalogs_admin_assets()
{
  wp_enqueue_style('catalogs-admin-stylesheet', get_template_directory_uri() . '/dist/assets/css/admin.css', array(), '1.0.0', 'all');

  wp_enqueue_script('catalogs-admin-scripts', get_template_directory_uri() . '/dist/assets/js/admin.js', array(), '1.0.0', 'all');
}

add_action('admin_enqueue_scripts', 'catalogs_admin_assets');

function catalogs_customize_preview_js()
{
  wp_enqueue_script('catalogs-customize-preview', get_template_directory_uri() . '/dist/assets/js/customize-preview.js', array('customize-preview', 'jquery'), '1.0.0', true);

  include(get_template_directory() . '/lib/inline-css.php');
  wp_localize_script('catalogs-customize-preview', 'catalogs', array('inline-css' => $inline_styles_selectors));
}

add_action('customize_preview_init', 'catalogs_customize_preview_js');
