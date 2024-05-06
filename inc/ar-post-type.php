<?php

if (!defined('ABSPATH')) {
	exit;
}

add_action('init', 'my_custom_init');
function my_custom_init()
{

	$label = 'Products';

	register_post_type('products', array(
		'labels'             => array(
			'name'              => 'Product', // Основное название типа записи
			'singular_name'     => 'Product', // отдельное название записи типа Book
			'add_new'           => __('Add Product'),
			'add_new_item'      => __('Add Product'),
			'edit_item'         => __('Edit Product'),
			'new_item'          => __('New Product'),
			'view_item'         => __('View'),
			'search_items'      => __('Search'),
			'parent_item_colon' => '',
			'menu_name'         => 'Product'
		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'menu_icon'          => get_template_directory_uri() . '/assets/i/static/product.png',
		'supports'           => array('title', 'thumbnail')
	));
}
