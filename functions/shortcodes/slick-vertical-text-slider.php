<?php if ( !defined('ABSPATH') ) exit();


if(!function_exists('anoshc_slick_vertical_text_slider')){
	
	function anoshc_slick_vertical_text_slider( $atts ){
	
		
		wp_enqueue_script('anoshc_slick');
		wp_enqueue_script('anoshc_slick-vtext-slider');
	
		
		ob_start();
		include ANOSHC_TMPLS . '/slick-vertical-text-slider.php';
		return ob_get_clean();
		
		
	}
}

add_shortcode( 'anoshc-slick-vertical-text-slider', 'anoshc_slick_vertical_text_slider' );



