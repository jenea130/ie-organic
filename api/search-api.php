<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}
function page_register_search()
{
  register_rest_route('api/v1', 'search', [
    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'pageSearchResults',
  ]);
}

add_action('rest_api_init', 'page_register_search');
function pageSearchResults($data)
{

  $s = $data['s'];

  $page = new WP_Query([
    'post_type' => 'page',
    'posts_per_page' => -1
  ]);

  $pages = $page->posts;
  if (empty($s)) {
    $pages_result = $pages;
  } else {
    foreach ($pages as $page) {
      if (strpos(strtolower($page->post_title), strtolower($s)) !== false) {
        $pages_result[] = $page;
      }
    }
  }
  $pages_result = array_map(function ($page) {
    return [
      'title' => $page->post_title,
      'link' => get_permalink($page->ID),
    ];
  }, $pages_result);

  $posts_wp = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => -1
  ]);

  $posts = $posts_wp->posts;
  $posts_result = [];

  if (empty($s)) {
    $posts_result = $posts;
  } else {
    foreach ($posts as $post) {
      if (strpos(strtolower($post->post_title), strtolower($s)) !== false) {
        $posts_result[] = $post;
      }
    }
  }

  $posts_result = array_map(function ($post) {
    return [
      'title' => $post->post_title,
      'link' => get_permalink($post->ID),
    ];
  }, $posts_result);

  $products = new WP_Query([
    'post_type' => 'products',
    'posts_per_page' => -1
  ]);

  $products = $products->posts;
  $products_result = [];

  if (empty($s)) {
    $products_result = $products;
  } else {
    foreach ($products as $product) {
      if (strpos(strtolower($product->post_title), strtolower($s)) !== false) {
        $products_result[] = $product;
      }
    }
  }

  $products_result = array_map(function ($product) {
    return [
      'title' => $product->post_title,
      'link' => get_permalink($product->ID),
    ];
  }, $products_result);

  $product_categories = get_terms([
    'taxonomy' => 'product-category',
    'hide_empty' => false,
  ]);

  $product_categories_result = [];
  foreach ($product_categories as $product_category) {
    if (strpos(strtolower($product_category->name), strtolower($s)) !== false) {
      $product_categories_result[] = $product_category;
    }
  }

  $product_categories_result = array_map(function ($product_category) {
    return [
      'title' => $product_category->name,
      'link' => get_term_link($product_category),
    ];
  }, $product_categories_result);

  return [
    [
      "title" => "Pages",
      "results" => $pages_result,
    ],
    [
      "title" => "Posts",
      "results" => $posts_result,
    ],
    [
      "title" => "Products",
      "results" => $products_result,
    ],
    [
      "title" => "Product Categories",
      "results" => $product_categories_result,
    ],
  ];
}
