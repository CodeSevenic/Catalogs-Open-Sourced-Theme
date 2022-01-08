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

function catalogsSearchResults($data)
{
  $storeQuery = new WP_Query(array(
    'post_type' => array('store'),
    's' => sanitize_text_field($data['term']),
  ));
  $results = array(
    'stores' => array(),
    'categories' => array(),
    'catalogs' => array()
  );

  while ($storeQuery->have_posts()) {
    $storeQuery->the_post();
    array_push($results['stores'], array(
      'title' => get_the_title(),
      'link' => get_the_permalink(),
      'coverTitle' => get_field('cover_title'),
    ));

    $catalog_content = get_field('catalog_content');
    foreach ($catalog_content as $content) {
      array_push($results['catalogs'], $content['catalog_title']);
    }
  }
  wp_reset_postdata();

  $args = array(
    'taxonomy'      => array('store_type'),
    'orderby'       => 'id',
    'order'         => 'ASC',
    'hide_empty'    => false,
    'fields'        => 'all',
    'name__like'    => $data['term']
  );



  $terms = get_terms($args);

  foreach ($terms as $tax) {
    array_push($results['categories'], array('category_name' => $tax->name, 'category_link' => get_term_link($tax->term_id, 'store_type')));
  }


  return $results;
}

add_action('rest_api_init', 'catalogsRegisterSearch');
