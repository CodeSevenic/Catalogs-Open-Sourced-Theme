<?php

function catalogs_theme_support()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', array('search-form', 'comment-list', 'comment-form', 'gallery', 'caption'));
  add_theme_support('customize-selective-refresh-widgets');
  add_theme_support('custom-logo', array(
    'height' => 200,
    'width' => 600,
    'flex-height' => true,
    'flex-width' => true,
  ));
  add_theme_support('post-formats', array(
    'aside',
    'audio',
    'chat',
    'gallery',
    'image',
    'link',
    'quote',
    'status',
    'video',
  ));
  add_theme_support('align-wide');
  // add_image_size('catalogs-blog-image', 1200, 0);
  add_image_size('catalog-image', 260, 350);
  add_image_size('catalog-logo', 170, 71);
  add_theme_support('editor-styles');
  add_editor_style('dist/assets/css/editor.css');
}

add_action('after_setup_theme', 'catalogs_theme_support');
