<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'init', 'my_custom_init' );
function my_custom_init() {
	register_post_type( 'servizi', array(
		'labels'             => array(
			'name'              => 'Servizi', // Основное название типа записи
			'singular_name'     => 'Servizi', // отдельное название записи типа Book
			'add_new'           => __( 'Aggiungi Servizi' ),
			'add_new_item'      => __( 'Aggiungi Servizi' ),
			'edit_item'         => __( 'Modifica Servizi' ),
			'new_item'          => __( 'Nuova Servizi' ),
			'view_item'         => __( 'Vedi' ),
			'search_items'      => __( 'Cerca' ),
			'parent_item_colon' => '',
			'menu_name'         => 'Servizi'
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
		'menu_icon'          => 'dashicons-admin-home',
		'supports'           => array( 'title', 'thumbnail' )
	) );
}
