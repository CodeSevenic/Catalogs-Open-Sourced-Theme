<?php

function catalogs_customize_register($wp_customize)
{
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  // Selective refresh for header name or logo
  $wp_customize->selective_refresh->add_partial('blogname', array(
    'selector' => '.c-header__blogname',
    'container_inclusive' => false,
    'render_callback' => function () {
      bloginfo('name');
    }
  ));

  /*################# SINGLE SETTINGS #################*/


  $wp_customize->add_section('catalogs_single_blog_options', array(
    'title' => esc_html__('Single Blog Options', 'catalogs'),
    'description' => esc_html__('You can change single blog options from here.', 'catalogs'),
    'active_callback' => 'catalogs_show_single_blog_section'
  ));

  $wp_customize->add_setting('catalogs_display_author_info', array(
    'default' => true,
    'transport' => 'postMessage',
    'sanitize_callback' => 'themename_sanitize_checkbox'
  ));

  $wp_customize->add_control('catalogs_display_author_info', array(
    'type' => 'checkbox',
    'label' => esc_html__('Show Author Info', 'catalogs'),
    'section' => 'catalogs_single_blog_options'
  ));

  function themename_sanitize_checkbox($checked)
  {
    return (isset($checked) && $checked === true) ? true : false;
  }

  function catalogs_show_single_blog_section()
  {
    global $post;
    return is_single() && $post->post_type === 'post';
  }

  /*################# GENERAL SETTINGS #################*/

  $wp_customize->add_section('catalogs_general_options', array(
    'title' => esc_html__('General Options', 'catalogs'),
    'description' => esc_html__('You can change general options from here.', 'catalogs'),
  ));

  $wp_customize->add_setting('catalogs_accent_color', array(
    'default' => '#20ddae',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color'
  ));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'catalogs_accent_color', array(
    'label' => __('Accent Color', 'catalogs'),
    'section' => 'catalogs_general_options'
  )));

  /*################# FOOTER SETTINGS #################*/

  $wp_customize->selective_refresh->add_partial('_theme_footer_partial', array(
    'settings' => array('catalogs_footer_bg', 'catalogs_footer_layout'),
    'selector' => '#footer',
    'container_inclusive' => false,
    'render_callback' => function () {
      get_template_part('template-parts/footer/widgets');
      get_template_part('template-parts/footer/info');
    }
  ));

  $wp_customize->add_section('catalogs_footer_options', array(
    'title' => esc_html__('Footer Options', 'catalogs'),
    'description' => esc_html__('You can change footer options from here.', 'catalogs'),
  ));

  $wp_customize->add_setting('catalogs_site_info', array(
    'default' => '',
    'sanitize_callback' => 'catalogs_sanitize_site_info',
    'transport' => 'postMessage'
  ));

  $wp_customize->add_control('catalogs_site_info', array(
    'type' => 'text',
    'label' => esc_html__('Site Info', 'catalogs'),
    'section' => 'catalogs_footer_options'
  ));

  $wp_customize->add_setting('catalogs_footer_bg', array(
    'default' => 'dark',
    'transport' => 'postMessage',
    'sanitize_callback' => 'catalogs_sanitize_footer_bg'
  ));

  $wp_customize->add_control('catalogs_footer_bg', array(
    'type' => 'select',
    'label' => esc_html__('Footer Background', 'catalogs'),
    'choices' => array(
      'light' => esc_html__('Light', 'catalogs'),
      'dark' => esc_html__('Dark', 'catalogs')
    ),
    'section' => 'catalogs_footer_options'
  ));

  // Footer Layout Options
  $wp_customize->add_setting('catalogs_footer_layout', array(
    'default' => '3,3,3,3',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
    'validate_callback' => 'catalogs_validate_footer_layout'
  ));

  $wp_customize->add_control('catalogs_footer_layout', array(
    'type' => 'text',
    'label' => esc_html__('Footer Layout', 'catalogs'),
    'section' => 'catalogs_footer_options'
  ));
}

// Custom Sanitize Text Field
add_action('customize_register', 'catalogs_customize_register');

// Input validation function
function catalogs_validate_footer_layout($validity, $value)
{
  if (preg_match('/^([1-9]|1[012])(,([1-9]|1[012]))*$/', $value)) {
    $validity->add('invalid_footer_layout', esc_html__('Footer layout is invalid', 'catalogs'));
  }
  return $validity;
}

function catalogs_sanitize_footer_bg($input)
{
  $valid = array('light', 'dark');
  if (in_array($input, $valid, true)) {
    return $input;
  }

  return 'dark';
}

function catalogs_sanitize_site_info($input)
{
  $allowed = array('a' => array(
    'href' => array(),
    'title' => array()
  ));

  return wp_kses($input, $allowed);
}
