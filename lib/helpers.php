<?php

function catalogs_post_meta()
{
  get_template_part('template-parts/content', 'post_meta');
}

function catalogs_readmore_link()
{
  get_template_part('template-parts/content', 'readmore_link');
}

function catalogs_delete_post()
{
  $url = add_query_arg([
    'action' => 'catalogs_delete_post',
    'post' => get_the_ID(),
    'nonce' => wp_create_nonce('catalogs_delete_post_' . get_the_ID())
  ], home_url());
  if (current_user_can('delete_post', get_the_ID())) {
    return "<a href='" . esc_url($url) . "'>" . esc_html__('Delete Post', 'catalogs') . "</a>";
  }
}

function catalogs_meta($id, $key, $default)
{
  $value = get_post_meta($id, $key, true);
  if (!$value && $default) {
    return $default;
  }
  return $value;
}
