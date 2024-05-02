<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}
function bs_vite_scripts()
{
  if (defined('IS_VITE_DEVELOPMENT') && IS_VITE_DEVELOPMENT === true) {
    require_once __DIR__ . '/build-styles.php';
  }

  // wp_enqueue_script('bs_vite-form-styler-js', get_template_directory_uri() . '/assets/libs/jquery-form-styler/jquery.formstyler.min.js', ['jquery'], null, true);
  wp_enqueue_script('bs_vite-slick-js', get_template_directory_uri() . '/assets/libs/slick/slick/slick.min.js', ['jquery'], null, true);
  wp_enqueue_script('bs_vite-custom-jquery-js', get_template_directory_uri() . '/assets/js/custom-jquery.js', ['jquery'], null, true);
}

add_action('wp_enqueue_scripts', 'bs_vite_scripts', 15);
