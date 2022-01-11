<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if (!function_exists('anoshc_rhombus_grid_imgs')) {
	function anoshc_rhombus_grid_imgs($atts){
	
		$atts = shortcode_atts( array(
	        'images_list' => '',
	    ), $atts );
		
		extract($atts);
		
		if($images_list == '') return "Please add imags's IDs to the short code e.g. [[rhombus-grid-imgs images_list = 123,258,566]]";

		wp_enqueue_script('anoshc_rhombus-images-grid');
		
		$html = '<div class="rhombus-grid-contaniner"><div class="rhombus-grid">';
		$images_list = explode(',', $images_list);
	  		foreach($images_list as $id){
				$image_attributes = wp_get_attachment_image_src( $id, 'full' );
				if ( $image_attributes ) : 
					$html .= '<img src="'.$image_attributes[0].'" />';
				endif;
			}
		$html .= '</div></div>';
		
		return $html;
	}
}

add_shortcode('rhombus-grid-imgs', 'anoshc_rhombus_grid_imgs');