<?php

/* Register Css media */
function register_css_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('bootstrap-theme');

	wp_register_style('magnific', get_template_directory_uri() . '/css/magnific-popup.css', array(), '1.0.0', 'all');
	wp_enqueue_style('magnific');

    wp_register_style('main-css', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
    wp_enqueue_style('main-css');
}
add_action('wp_enqueue_scripts', 'register_css_styles');

/* Register JS Scripts */
function register_js_scripts() {
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-2.2.4.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('jquery');

    wp_register_script('botstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('botstrap-js');

	wp_register_script('magnific-js', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('magnific-js');

    wp_register_script('custom-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('custom-script');
}
add_action('wp_enqueue_scripts', 'register_js_scripts');



register_nav_menus( array(
    'main_navigation' => 'Main menu',
    'mobile_navigation' => 'Mobile menu'

));

add_theme_support( 'post-thumbnails' );
add_image_size("first-size", 10, 10, true );

function pw_show_image_sizes($sizes) {
    $sizes['first-size'] = __( 'First size 10x10', 'itb' );
    return $sizes;
}
add_filter('image_size_names_choose', 'pw_show_image_sizes');




add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
    load_theme_textdomain('itb', get_template_directory() . '/languages');
}


?>