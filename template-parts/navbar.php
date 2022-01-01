<div class="container mx-auto pt-2 px-1 sm:px-5 flex justify-end">
  <?php get_search_form(true);
  ?>
</div>
<div class="container mx-auto px-1 sm:px-5 flex justify-between parent-wrapper">

  <a class="home_icon" href="<?php echo home_url() ?>">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
      <path d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z" />
    </svg>
  </a>
  <?php
  $term_id = get_queried_object_id();
  if (get_queried_object()) {
    $term_name = get_queried_object()->name;
  } else {
    $term_name = '';
  }
  // Get All Taxonomies
  $tax = get_terms(array(
    'taxonomy' => 'store_type',
    'hide_empty' => false
  ));
  ?>
  <div class="cat-dropdown">
    <input id="cat_input" type="text" class="textBox" placeholder="<?php echo $term_name ?  $term_name : 'Catagories' ?>" readonly />
    <div class="option">
      <?php if ($tax) {
        foreach ($tax as $t) {
          $the_term_link = get_term_link($t->term_id, 'store_type');
      ?>

          <div onclick="show('<?php echo $t->name ?>', '<?php echo $the_term_link ?>')" href="<?php echo $the_term_link ?>">
            <svg class="check-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z" />
            </svg><?php echo $t->name ?>
          </div>
      <?php }
      } ?>
    </div>
  </div>
  <?php
  ?>

  <nav class="nav-mobile">
    <div class="menu-wrapper">
      <ul class="menu-bar">
        <li class="menu-title">
          <a href="#">
            <div class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M464 480H48c-26.51 0-48-21.49-48-48V80c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v352c0 26.51-21.49 48-48 48zM128 120c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm0 96c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm0 96c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm288-136v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12zm0 96v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12zm0 96v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12z" />
              </svg>
            </div>
            Menu
          </a>
        </li>
        <?php
        if ($tax) {
          foreach ($tax as $t) { ?>
            <li class="menu-list">
              <a href="#">
                <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">

                    <path d="M464 128H272l-64-64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V176c0-26.51-21.49-48-48-48z" />
                  </svg>
                </div>
                <?php echo $t->name ?> <svg class="right-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                  <path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z" />
                </svg>
              </a>
            </li>
        <?php  }
        }
        ?>
      </ul>
      <?php
      // Get All Taxonomies
      $tax = get_terms(array(
        'taxonomy' => 'store_type',
        'hide_empty' => false
      ));

      foreach ($tax as $t) {
        // Posts by terms
        $tax_args_ = [
          // 'fields' => 'ids',
          'post_type' => 'store',
          'posts_per_page' => -1,
          'tax_query' => [
            [
              'taxonomy' => 'store_type',
              'field' => 'term_id',
              'terms' => $t->term_id
            ]
          ]
        ];
        $menu_items = get_posts($tax_args_);
      ?>
        <ul class="menu-list-drop children-drops">
          <li class="arrow back-btn">
            <svg class="back-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
              <path d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z" />
            </svg>Back
          </li>
          <?php foreach ($menu_items as $val) { ?>
            <li><a href="<?php echo get_permalink($val) ?>"><?php echo $val->post_title ?></a></li>
          <?php  }
          ?>
        </ul>
      <?php }

      ?>


    </div>
  </nav>

  <div class="drop-btn">
    <div class="toggle">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</div>