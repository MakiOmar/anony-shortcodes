<?php if ( !defined('ABSPATH') ) exit();

if(!function_exists('anoshc_flickity_slider')){
	
	function anoshc_flickity_slider( $atts ){
	
		wp_enqueue_script('anoshc_flickity');

		add_action('wp_footer', function(){?>
			<script type="text/javascript">
				
				var flky = new Flickity( '.carousel' );

			</script>
		<?php });
		
		ob_start();
		include ANOSHC_TMPLS . '/flickity-slider.php';
		return ob_get_clean();
	}
}

add_shortcode( 'flickity-gallery', 'anoshc_flickity_slider' );