<?php
function catalogs_custom_rest()
{
  register_rest_field('store', 'storeName', array(
    'get_callback' => function () {
      return get_the_author();
    }
  ));
}

add_action('rest_api_init', 'catalogs_custom_rest');

function catalogsRegisterSearch()
{
  register_rest_route('catalogs/v1', 'search', array(
    'method' => WP_REST_SERVER::READABLE,
    'callback' => 'catalogsSearchResults'
  ));
}

function catalogsSearchResults()
{
  return 'Congrats you created a route';
}

add_action('rest_api_init', 'catalogsRegisterSearch');
