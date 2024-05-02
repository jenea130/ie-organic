<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}
function page_register_search()
{
  register_rest_route('page/v1', 'search', [
    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'pageSearchResults',
  ]);
}

add_action('rest_api_init', 'page_register_search');
function pageSearchResults($data)
{
  $title = $data['title'];

  $page_result = [];

  $page = new WP_Query([
    'post_type' => 'page',
    'posts_per_page' => -1,
    's' => $title,
  ]);

  while ($page->have_posts()) {
    $page->the_post();
    $slug = basename(get_permalink(get_the_ID()));

    $page_result[] = [
      'id' => get_the_ID(),
      'title' => html_entity_decode(get_the_title()),
      'url' => get_the_permalink(),
      'img' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
      'slug' => $slug
    ];
  }

  return [
    "pages" => $page_result,
  ];
}
