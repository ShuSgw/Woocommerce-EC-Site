<?php

/* Template Name: front-page */

// child theme
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri(), array('parent-style'));
}

add_action('wp_enqueue_scripts', 'add_scripts');

function add_scripts()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('tweenmax', get_stylesheet_directory_uri().'/assets/js/TweenMax.min.js');
    wp_enqueue_script('main', get_stylesheet_directory_uri().'/assets/js/main.js');
}

// to setup grid sized elements
add_image_size('normal', 536, 307, true);
add_image_size('long', 260, 627, true);
add_image_size('small', 260, 307, true);
add_image_size('big', 536, 627, true);
add_filter('woocommerce_get_image_size_single', 'crop_wc_image_single');

// to stop chnageing layout based on size of images in single product page
function crop_wc_image_single($size)
{
    $cropping = get_option('woocommerce_thumbnail_cropping', '1: 1');

    if ('uncropped' === $cropping) {
        $size['height'] = 9999999999;
        $size['crop'] = 0;
    } elseif ('custom' === $cropping) {
        $width = max(1, get_option('woocommerce_thumbnail_cropping_custom_width', '4'));
        $height = max(1, get_option('woocommerce_thumbnail_cropping_custom_height', '3'));
        $size['height'] = round(($size['width'] / $width) * $height);
        $size['crop'] = 1;
    } else {
        $cropping_split = explode(':', $cropping);
        $width = max(1, current($cropping_split));
        $height = max(1, end($cropping_split));
        $size['height'] = round(($size['width'] / $width) * $height);
        $size['crop'] = 1;
    }

    return $size;
}

// to remove no need elements
function remove_thematic_actions()
{
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 50);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 20);
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10);
    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
    remove_action('woocommerce_product_meta_end', 'bbloomer_custom_action', 5);
    // remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
    remove_theme_support('wc-product-gallery-zoom');
    add_filter('woocommerce_product_description_heading', '__return_null');
}
add_action('init', 'remove_thematic_actions');

add_action('admin_menu', 'remove_menus');
function remove_menus()
{
    // remove_menu_page('index.php'); //ダッシュボード
    // remove_menu_page('edit.php'); //投稿メニュー
    // remove_menu_page('upload.php'); //メディア
    // remove_menu_page('edit.php?post_type=page'); //ページ追加
    // remove_menu_page('edit-comments.php'); //コメントメニュー
    // remove_menu_page('themes.php'); //外観メニュー
    // remove_menu_page('plugins.php'); //プラグインメニュー
    // remove_menu_page('tools.php'); //ツールメニュー
    // remove_menu_page('options-general.php'); //設定メニュー
}
