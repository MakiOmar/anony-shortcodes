<?php if ( !defined('ABSPATH') ) exit();

if(!function_exists('anoshc_Menu_Icon_Slider')){
	
	function anoshc_Menu_Icon_Slider( $atts ){
		
		$atts = shortcode_atts( array(
	        'taxonomy' => 'category',
	        'hide_empty' => false,
	        'autoplay' => true,
	        'lazyload' => false,
	    ), $atts, 'menu-icon-slider' );
	    
	    
	    
		extract($atts);
		
		$data = get_terms([
			'taxonomy' => $taxonomy ,
			'hide_empty' => $hide_empty,
			'parent'=> 0
		]);

		if (empty($data) || !is_array($data)) return esc_html__( 'No items to display', ANOSHC_TEXTDOM );
		
		$slider_data = [];
		foreach ($data as $term) {
			
			$temp = [
			
				'id'   => $term->term_id,
				'name' => $term->name,
				'url'  => esc_url( get_term_link( $term->term_id ) ),

			
			];
			
			$icon_url = get_term_meta( $term->term_id,  'category_icon_alt', $single = true );
			
			$temp ['icon_url'] = ($icon_url && $icon_url != '') ? $icon_url : '';
			
			$slider_data[] = $temp;

		}
		$carousel_opts = " loop:true,
					    margin:10,
					    speed:3000,
					    nav:true,
					    navText : ['<i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i>','<i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i>'],
					    responsive:{
					        0:{
					            items:1
					        },
					        600:{
					            items:3
					        },
					        1000:{
					            items:4
					        }
					    }";
		if(is_rtl()) $carousel_opts .= ", rtl : true";
		
		wp_enqueue_script( 'owl.carousel' );
		
		add_action( 'wp_footer', function() use($carousel_opts){
		
			echo "<script type='text/javascript'>
					jQuery(document).ready(function($){
						$('.anony-menu-owl-carousel').owlCarousel({
						   ".$carousel_opts."
						});
					})
					</script>";
		} );
				
		
		ob_start();
		include ANOSHC_TMPLS . '/menu-icon-slider.php';
		return ob_get_clean();
	}
}

add_shortcode( 'menu-icon-slider', 'anoshc_Menu_Icon_Slider' );
?>