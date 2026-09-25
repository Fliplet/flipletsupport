<?php
/**
 * Functions that enqueue the scripts and loads them.
 *
 * @package Fliplet
 * @subpackage Fliplet_Support
 * @since 1.0.0
 */

/* Enqueues the scripts */
function load_jquery() {
  wp_register_script('jquery_3_4_1', get_template_directory_uri() . '/js/vendor/jquery/jquery-3.4.1.min.js', '', '3.4.1', false);

  wp_enqueue_script('jquery_3_4_1');
}

function load_bootstrap_js() {
  wp_register_script('bootstrap_js', get_template_directory_uri() . '/js/vendor/bootstrap/bootstrap.min.js', '', '4.4.1', false);

  wp_enqueue_script('bootstrap_js');
}

function load_theme_js() {
  wp_register_script('theme_js', get_template_directory_uri() . '/js/scripts.js', '', '1.0.3', false);

  wp_enqueue_script('theme_js');
}

add_action('wp_enqueue_scripts', 'load_jquery');
add_action('wp_enqueue_scripts', 'load_bootstrap_js');
add_action('wp_enqueue_scripts', 'load_theme_js');
?>
