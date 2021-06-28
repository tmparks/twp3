<?php

/// Add support for featured images.
/// See [Featured Images and Post Thumbnails](https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/)
add_action('after_setup_theme', function () {
  add_theme_support('post-thumbnails');
});

/// Each featured image uses its title as a link.
add_filter(
  'post_thumbnail_html',
  function($html, $post_id, $post_image_id) {
    $title = get_the_title($post_image_id );
    if ($title != '') {
      $html = '<a href="' . esc_attr($title) . '">' . $html . '</a>';
    }
    return $html;
}, 10, 3);

/// Sort posts by name (slug) in ascending order.
add_action('pre_get_posts', function($query) {
  if (!is_admin() and $query->is_main_query()) {
    $query->set('orderby', 'name');
    $query->set('order', 'ASC');
  }
});

/// Force login.
/// Redirect users who are _not_ administrators to the home page.
add_filter(
  'login_redirect',
  function($redirect_to, $requested_redirect_to, $user) {
    if ( is_a($user, 'WP_User') and ! is_super_admin($user->ID)) {
      $redirect_to = home_url();
    }
    return $redirect_to;
  },
  10,
  3);

/// Set a long authentication cookie expiration length
/// for users who are _not_ administrators.
add_filter(
  'auth_cookie_expiration',
  function ($length, $user_id, $remember) {
    if ( ! is_super_admin($user_id)) {
      $length = 10 * YEAR_IN_SECONDS;
    }
    return $length;
  },
  10,
  3);
?>
