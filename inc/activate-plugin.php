<?php
// activeat plugins
function true_plugins_activate() {
	if ( $active_plugins = get_option('active_plugins') ) { // вытаскиваем массив с активными плагинами
		$activate_this = array( // в массиве перечисляем плагины которые хотим включить, путь к файлу плагина относительно папки plugins, о том как его узнать, написано ниже
			'wps-hide-login/wps-hide-login.php' // и плагин списка страниц
		);
		foreach ( $activate_this as $plugin ) {
			if ( ! in_array( $plugin, $active_plugins ) ) {
				array_push( $active_plugins, $plugin );
				update_option( 'active_plugins', $active_plugins );
			}
		}
 
	}
}
 
add_action( 'admin_init', 'true_plugins_activate', 10 );

//deactivate plugins
/* function true_plugins_deactivate() { */
/* 	if ( $active_plugins = get_option('active_plugins') ) { */
/* 		$deactivate_this = array( // в массиве перечисляем плагины которые хотим деактивировать */
/* 			'akismet/akismet.php' // например этот плагин от спама */
/* 		); */
/* 		$active_plugins = array_diff( $active_plugins, $deactivate_this ); */
/* 		update_option( 'active_plugins', $active_plugins ); */
/* 	} */
/* } */
 
/* add_action( 'admin_init', 'true_plugins_deactivate', 20 ); */

// show plugin slug in admin/plugins
/* function true_echo_plugin_path( $plugin_meta, $plugin_file, $plugin_data, $status ) { */
/* 	echo '<code>' . $plugin_file . '</code><br />'; */
/* 	return $plugin_meta; */
/* } */
 
/* add_filter( 'plugin_row_meta', 'true_echo_plugin_path', 10, 4 ); */

