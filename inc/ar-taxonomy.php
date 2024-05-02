<?php
if (!defined('ABSPATH')) {
    exit;
}
// хук для регистрации
add_action('init', 'create_taxonomy');
function create_taxonomy()
{
    $field = "Categorie";
    register_taxonomy('categorie', ['camere'], [
        'label' => '',
        'labels' => [
            'name' => $field,
            'singular_name' => $field,
            'search_items' => 'Search ' . $field,
            'all_items' => 'All ' . $field,
            'view_item ' => 'View ' . $field,
            'parent_item' => 'Parent ' . $field,
            'parent_item_colon' => 'Parent :.$field',
            'edit_item' => 'Edit ' . $field,
            'update_item' => 'Update ' . $field,
            'add_new_item' => 'Add New ' . $field,
            'new_item_name' => 'New',
            'menu_name' => $field,
        ],
        'description' => '',
        'public' => true,
        'hierarchical' => false,
        'rewrite' => true,
        'capabilities' => array(),
        'meta_box_cb' => null,
        'show_admin_column' => true,
        'show_in_rest' => null,
        'rest_base' => null,
    ]);
}
