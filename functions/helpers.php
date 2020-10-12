<?php if ( !defined('ABSPATH') ) exit();

function anoshc_slider_data(){
	
	$args = [
	
		'post_type' => 'anoshc_slider',
		'posts_per_page' => -1
	];
	
	
	$query = new WP_Query($args);
	
	
	$data = [];
	
	if ($query->have_posts()) {
		
		while ($query->have_posts()) {
			$query->the_post();
		
			$temp['id'] = get_the_ID(); 
			$temp['title'] = esc_html( get_the_title() );
			$temp['content'] = get_the_content();
			$temp['thumb_img_full'] =  has_post_thumbnail() ? esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')) : esc_url( ANOSHC_IMGS . '/placeholder.jpg' ) ;
			
			$data[] = $temp;
		}
		
		wp_reset_postdata();
	}
	
	
	
	return $data;
}
