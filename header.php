<?php ?>
<html <?php language_attributes(); ?>>
<head>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="viewport" content = "width=1024,user-scalable=no">
<link rel="apple-touch-icon" href="image/apple-touch-icon.png">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php wp_title( '|', true, 'right' );?></title>
<link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_uri()); ?>" type="text/css" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
