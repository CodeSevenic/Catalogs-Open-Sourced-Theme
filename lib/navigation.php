<?php

function catalogs_register_menus()
{
  register_nav_menus(array(
    'main-menu' => esc_html('Main Menu', 'catalogs'),
    'footer-menu' => esc_html('Footer Menu', 'catalogs')
  ));
}

add_action('init', 'catalogs_register_menus');

// Filters

function catalogs_aria_hasdropdown($attrs, $item, $args)
{
  if ($args->theme_location == 'main-menu') {
    if (in_array('menu-item-has-children', $item->classes)) {
      $attrs['aria-haspopup'] = 'true';
      $attrs['aria-expanded'] = 'false';
    }
  }

  return $attrs;
}

add_filter('nav_menu_link_attributes', 'catalogs_aria_hasdropdown', 10, 3);

function catalogs_submenu_button($dir = 'down', $title)
{
  $button = '<button class="menu-button">';
  $button .= '<span class="u-screen-reader-text menu-button-show">' . sprintf(esc_html__('Show %s submenu', 'catalogs'), $title) . '</span>';
  $button .= '<span aria-hidden="true" class="u-screen-reader-text menu-button-show">' . sprintf(esc_html__('Hide %s submenu', 'catalogs'), $title) . '</span>';
  $button .= '<i class="fa fa-angle-' . $dir . '" aria-hidden="true"></i>';
  $button .= '</button>';

  return $button;
}

function catalogs_dropdown_icon($title, $item, $args, $depth)
{
  if ($args->theme_location == 'main-menu') {
    if (in_array('menu-item-has-children', $item->classes)) {
      if ($depth == 0) {
        $title .= catalogs_submenu_button('down', $title);
      } else {
        $title .= catalogs_submenu_button('right', $title);
      }
    }
  }

  return $title;
}

add_filter('nav_menu_item_title', 'catalogs_dropdown_icon', 10, 4);
