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

	$label = 'Our Experts';

	register_post_type('our-experts', array(
		'labels'             => array(
			'name'              => 'Our experts', // Основное название типа записи
			'singular_name'     => 'Our experts', // отдельное название записи типа Book
			'add_new'           => __('Add expert'),
			'add_new_item'      => __('Add expert'),
			'edit_item'         => __('Edit expert'),
			'new_item'          => __('New expert'),
			'view_item'         => __('View'),
			'search_items'      => __('Search'),
			'parent_item_colon' => '',
			'menu_name'         => 'Our expert'
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
		'menu_icon'          => get_template_directory_uri() . '/assets/i/static/experts.png',
		'supports'           => array('title', 'thumbnail')
	));

	$label = 'Services';

	register_post_type('services', array(
		'labels'             => array(
			'name'              => 'Service', // Основное название типа записи
			'singular_name'     => 'Service', // отдельное название записи типа Book
			'add_new'           => __('Add Service'),
			'add_new_item'      => __('Add Service'),
			'edit_item'         => __('Edit Service'),
			'new_item'          => __('New Service'),
			'view_item'         => __('View'),
			'search_items'      => __('Search'),
			'parent_item_colon' => '',
			'menu_name'         => 'Service'
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
		'menu_icon'          => get_template_directory_uri() . '/assets/i/static/service.png',
		'supports'           => array('title', 'thumbnail', 'excerpt', 'editor')
	));

	$label = 'Portfolio';

	register_post_type('portfolio', array(
		'labels'             => array(
			'name'              => 'Portfolio', // Основное название типа записи
			'singular_name'     => 'Portfolio', // отдельное название записи типа Book
			'add_new'           => __('Add Portfolio'),
			'add_new_item'      => __('Add Portfolio'),
			'edit_item'         => __('Edit Portfolio'),
			'new_item'          => __('New Portfolio'),
			'view_item'         => __('View'),
			'search_items'      => __('Search'),
			'parent_item_colon' => '',
			'menu_name'         => 'Portfolio'
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
		'menu_icon'          => get_template_directory_uri() . '/assets/i/static/portfolio.png',
		'supports'           => array('title', 'thumbnail', 'editor')
	));
}
