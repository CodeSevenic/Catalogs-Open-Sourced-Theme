<form autocomplete="off" class="custom_search" role="search" action="<?php echo esc_url(home_url('/')) ?>">

  <div class="icon">
  </div>
  <div class="input">
    <input onkeydown="return (event.keyCode!=13);" type="text" placeholder="Search" id="my_search" value="<?php echo esc_attr(get_search_query()) ?>">
  </div>
  <span class="clear"></span>
  <!-- <button class="search-btn" type="submit"><span class="u-screen-reader-text"></span>
    <i class="fas fa-search" aria-hidden="true">
    </i>
  </button> -->
</form>