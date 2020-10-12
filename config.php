<?php
if ( !defined('ABSPATH') ) exit();

/**
 * Holds plugin text domain
 * @const
 */
define('ANOSHC_TEXTDOM', 'anonyengine-shortcodes');


/**
 * Holds plugin uri
 * @const
 */
define('ANOSHC_URI', plugin_dir_url( __FILE__ ));

/**
 * Holds classes folder path
 * @const
 */
define('ANOSHC_CLASSES', wp_normalize_path(ANOSHC_DIR . '/classes'));

/**
 * Holds libs folder path
 * @const
 */
define('ANOSHC_LIBS', wp_normalize_path(ANOSHC_DIR . '/libs'));

/**
 * Holds templates folder path
 * @const
 */
define('ANOSHC_TMPLS', wp_normalize_path(ANOSHC_DIR . '/templates'));

/**
 * Holds functions folder path
 * @const
 */
define('ANOSHC_FUNCS', wp_normalize_path(ANOSHC_DIR . '/functions'));

/**
 * Holds css folder path
 * @const
 */
define('ANOSHC_CSS', wp_normalize_path(ANOSHC_DIR . '/assets/css'));

/**
 * Holds js folder path
 * @const
 */
define('ANOSHC_JS', wp_normalize_path(ANOSHC_DIR . '/assets/js'));

/**
 * Holds imgs folder path
 * @const
 */
define('ANOSHC_IMGS', ANOSHC_URI . 'assets/imgs');

/**
 * Holds shortcodes folder path
 * @const
 */
define('ANOSHC_SHC', wp_normalize_path(ANOSHC_FUNCS . '/shortcodes'));

	
	
	
	/*----------------------Autoloading -------------------------*/

define('ANOSHC_AUTOLOADS' ,serialize(array(
	ANOSHC_CLASSES,
)));


/*
*Classes Auto loader
*/
spl_autoload_register( function ( $class_name ) {

	if ( false !== strpos( $class_name, 'ANOSHC_' )) {
		
		$original_name = $class_name;

		$class_name = preg_replace('/ANOSHC_/', '', $class_name);

		$class_name  = strtolower(str_replace('_', '-', $class_name));
		
		$class_file = $class_name .'.php';
		
		
		if(file_exists($class_file)){

			require_once($class_file);
			
			return;
		}
		foreach(unserialize( ANOSHC_AUTOLOADS ) as $path){
			
			
			$class_file = wp_normalize_path($path) .'/'  .$class_name . '.php';
			

			if(file_exists($class_file)){

				require_once($class_file);
				
				return;
			}
			

			$class_file = wp_normalize_path($path .'/' . $class_name .'/' .$class_name . '.php');

			if(file_exists($class_file)){

				require_once($class_file);
				
				return;
			}

			$class_folder = explode('-', $class_name);
			
			$class_file = wp_normalize_path($path .'/' . $class_folder[0] .'/' .$class_name . '.php');

			if(file_exists($class_file)){

				require_once($class_file);
				
				return;
			}
			
		}
				
	}
} );


