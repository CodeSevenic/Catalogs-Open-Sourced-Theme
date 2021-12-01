<form class="custom_search" role="search" method="GET" action="<?php echo esc_url(home_url('/')) ?>">

  <div class="icon">
  </div>
  <div class="input">
    <input type="text" name="s" placeholder="Search" id="my_search" value="<?php echo esc_attr(get_search_query()) ?>">
  </div>
  <span class="clear"></span>
  <button class="search-btn" type="submit"><span class="u-screen-reader-text"><?php echo esc_html_x('Search', 'submit button', 'catalogs') ?></span>
    <i class="fas fa-search" aria-hidden="true">
    </i>
  </button>
</form>