<?php

// Add support for featured images.
add_action('after_setup_theme', function () {
  add_theme_support('post-thumbnails');
});

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
