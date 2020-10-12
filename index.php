<?php
if ( !defined('ABSPATH') ) exit();
/**
 * Plugin Name: AnonyEngine shortcodes
 * Plugin URI: https://makiomar.com
 * Description: Some shortcodes
 * Version: 1.0.0
 * Author: Mohammad Omar
 * Author URI: https://makiomar.com
 * Text Domain: anonyengine-shortcodes
 * License: GPL2
*/

/**
 * Holds plugin PATH
 * @const
 */ 

define('ANOSHC_DIR' , wp_normalize_path(plugin_dir_path( __FILE__ )));

require_once (wp_normalize_path( ANOSHC_DIR . '/config.php' ));

require_once (wp_normalize_path( ANOSHC_FUNCS . '/helpers.php' ));

require_once (wp_normalize_path( ANOSHC_FUNCS . '/scripts.php' ));

require_once (wp_normalize_path( ANOSHC_FUNCS . '/slider-data.php' ));

require_once (wp_normalize_path( ANOSHC_SHC . '/circle-slider.php' ));

require_once (wp_normalize_path( ANOSHC_SHC . '/menu-icon-slider.php' ));

add_action( 'wp_footer', function(){
	
	
	
} );