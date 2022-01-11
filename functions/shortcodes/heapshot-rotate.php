<?php if ( !defined('ABSPATH') ) exit();

if(!function_exists('anoshc_heapshot_rotate')){
	
	function anoshc_heapshot_rotate( $atts ){
	
		wp_enqueue_script('anoshc_imagesloaded');
		wp_enqueue_script('anoshc_jQueryRotate');
		wp_enqueue_script('anoshc_heapshot');
		wp_enqueue_script('anoshc_headpshot-init');
		
		ob_start();
		include ANOSHC_TMPLS . '/heapshot-rotate.php';
		return ob_get_clean();
	}
}

add_shortcode( 'heapshot-rotate', 'anoshc_heapshot_rotate' );