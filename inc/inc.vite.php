<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
  exit;

/*
 * VITE  development
 * Inspired by https://github.com/andrefelipe/vite-php-setup
 *
 */

// enqueue hook
add_action('wp_enqueue_scripts', function () {

  if (defined('IS_VITE_DEVELOPMENT') && IS_VITE_DEVELOPMENT === true) {

    // insert hmr into head for live reload
    function vite_head_module_hook()
    {
      echo '<script type="module" crossorigin src="http://localhost:3000/main.ts"></script>';
    }

    add_action('wp_head', 'vite_head_module_hook');
  } else {
    require_once __DIR__ . '/build-styles.php';
    wp_enqueue_style('build-css', get_template_directory_uri() . '/dist/main-hash.css');
    wp_enqueue_script('build-js', get_template_directory_uri() . '/dist/main-hash.js', [], null, true);

    // add type module to main.js
    add_filter('script_loader_tag', function ($tag, $handle) {
      if ($handle === 'build-js') {
        $tag = str_replace(' src', ' type="module" src', $tag);
      }
      return $tag;
    }, 10, 2);
  }
}, 20);


