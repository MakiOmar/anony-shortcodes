<?php if ( !defined('ABSPATH') ) exit();

if(!function_exists('anoshc_circle_slider')){
	
	function anoshc_circle_slider( $atts ){
		
		$data = anoshc_slider_data();
		
		if (empty($data)) return esc_html__( 'No data to display', ANOSHC_TEXTDOM );
		
		ob_start();
		include ANOSHC_TMPLS . '/circle-slider.php';
		return ob_get_clean();
	}
}

add_shortcode( 'circle-slider', 'anoshc_circle_slider' );