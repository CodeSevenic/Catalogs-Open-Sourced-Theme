<?php

function catalogs_add_meta_box()
{
  add_meta_box('catalogs_post_metabox', esc_html__('Post Settings', 'catalogs'), 'catalogs_post_metabox_html', 'post', 'normal', 'default');
}

add_action('add_meta_boxes', 'catalogs_add_meta_box');

function catalogs_post_metabox_html($post)
{
  $subtitle = get_post_meta($post->ID, '_catalogs_post_subtitle', true);
  $layout = get_post_meta($post->ID, '_catalogs_post_layout', true);
  wp_nonce_field('catalogs_update_post_metabox', 'catalogs_update_post_nonce');
?>
  <p>
    <label for="catalogs_post_metabox_html"><?php esc_html_e('Post Subtitle', 'catalogs'); ?></label>
    <br />
    <input class="widefat" type="text" name="catalogs_post_subtitle_field" id="catalogs_post_metabox_html" value="<?php echo esc_attr($subtitle); ?>">
  </p>
  <p>
    <label for="catalogs_post_layout_field"><?php esc_html_e('Layout', 'catalogs') ?></label>
    <select name="catalogs_post_layout_field" id="catalogs_post_layout_field" class="widefat">
      <option <?php selected($layout, 'full'); ?> value="full"><?php esc_html_e('Full Width', 'catalogs') ?></option>
      <option <?php selected($layout, 'sidebar'); ?> value="sidebar">
        <?php esc_html_e('Post With Sidebar', 'catalogs') ?></option>
    </select>
  </p>
<?php } ?>

<?php

function catalogs_save_post_metabox($post_id, $post)
{
  $edit_cap = get_post_type_object($post->post_type)->cap->edit_post;
  if (!current_user_can($edit_cap, $post_id)) {
    return;
  }

  if (!isset($_POST['catalogs_update_post_nonce']) || !wp_verify_nonce($_POST['catalogs_update_post_nonce'], 'catalogs_update_post_metabox')) {
    return;
  }

  if (array_key_exists('catalogs_post_subtitle_field', $_POST)) {
    update_post_meta($post_id, '_catalogs_post_subtitle', sanitize_text_field($_POST['catalogs_post_subtitle_field']));
  }

  if (array_key_exists('catalogs_post_layout_field', $_POST)) {
    update_post_meta($post_id, '_catalogs_post_layout', sanitize_text_field($_POST['catalogs_post_layout_field']));
  }
}

add_action('save_post', 'catalogs_save_post_metabox', 10, 2);
