<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
        <a href="<?php echo get_home_url(); ?>"><h1><?php bloginfo(); ?></h1></a>
        <a href=<?php echo wc_get_cart_url(); ?>>Cart</a>
        
        <?php
            wp_nav_menu();
        ?>
        </header>

	</header><!-- #masthead -->
