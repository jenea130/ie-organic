<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
		'page_title' => 'Acf Settings',
		'menu_title' => 'Acf Settings',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );
	acf_add_options_sub_page( array(
		'page_title'  => 'Header',
		'menu_title'  => 'Header',
		'parent_slug' => 'theme-general-settings',
	) );
	acf_add_options_sub_page( array(
		'page_title'  => 'Footer',
		'menu_title'  => 'Footer',
		'parent_slug' => 'theme-general-settings',
	) );
}
