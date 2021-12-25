<?php

$footer_layout = sanitize_text_field(get_theme_mod('catalogs_footer_layout', '3,3,3,3'));
$footer_layout = preg_replace('/\s+/', '', $footer_layout);
$columns = explode(',', $footer_layout);
$footer_bg = catalogs_sanitize_footer_bg(get_theme_mod('catalogs_footer_bg', 'dark'));
$widget_active = false;
foreach ($columns as $i => $column) {
  if (is_active_sidebar('footer-sidebar-' . ($i + 1))) {
    $widget_active = true;
  }
}

?>
<?php if ($widget_active) { ?>

  <div class="c-footer c-footer--<?php echo $footer_bg;   ?>">
    <div class="o-container">
      <div class="flex bg-sky-900 py-10 px-5 flex-wrap md:flex-nowrap">
        <?php
        foreach ($columns as $i => $column) { ?>


          <div class="px-2 pb-5">
            <?php if (is_active_sidebar('footer-sidebar-' . ($i + 1))) {
              dynamic_sidebar('footer-sidebar-' . ($i + 1));
            } ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
<?php } ?>