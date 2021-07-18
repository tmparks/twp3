<?php if ( ! is_user_logged_in()) auth_redirect(); ?>
<html <?php language_attributes(); ?>>
<head>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="viewport" content = "width=1024,user-scalable=no">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php wp_title( '|', true, 'right' ); bloginfo('title'); ?></title>
<link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_uri()); ?>" type="text/css" />
<?php if (is_super_admin()) : ?>
  <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
<?php else : ?>
  <?php if (has_site_icon()) : ?>
    <link rel="apple-touch-icon" href="<?php site_icon_url(); ?>">
  <?php endif; ?>
  </head>
  <body>
<?php endif; ?>
