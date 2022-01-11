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


if (!function_exists('anoshc_common_post_data')) {
	/**
	 * Collects common post data
	 * @return array
	 */
	function anoshc_common_post_data($post_type = 'post'){
		
		$ID = get_the_ID();
		$temp['id']        = $ID;
		$temp['permalink'] = esc_url(get_the_permalink());
		$temp['title']     = esc_html(get_the_title());
		$temp['title_attr']        = the_title_attribute( ['echo' => false] );
		$temp['content']   = apply_filters('the_content',get_the_content());
		$temp['excerpt']   = get_the_excerpt();
		$temp['thumb']     = has_post_thumbnail();
		$temp['thumb_img_full']    = get_the_post_thumbnail($ID, 'full');
		$temp['thumb_img_full_url']    = get_the_post_thumbnail_url($ID, 'full');
		$temp['thumb_img']     = get_the_post_thumbnail($ID, 'category-post-thumb');
		$temp['thumbnail_img'] = get_the_post_thumbnail_url($ID, 'thumbnail');
		$temp['date']      = get_the_date();
		$temp['gravatar']  = get_avatar(get_the_author_meta('ID'),32, '', '', ['class' => 'gravatar']);
		$temp['author']    = sprintf(esc_html__( '%s', ANOSHC_TEXTDOM ), get_the_author());
		$temp['read_more']         = esc_html__('Read more',ANOSHC_TEXTDOM);
		$temp['comments_open']     = comments_open();
		$temp['has_category']      = has_category();
		
		if( $post_type == 'post'){
			if(has_category()){
				$_1st_category = get_the_category()[0];
				$temp['categories']         = get_the_category();
				$temp['_1st_category_id']   = $_1st_category->cat_ID;
				$temp['_1st_category_name'] = esc_html($_1st_category->name);
				$temp['_1st_category_url']  = esc_url(get_category_link($_1st_category->cat_ID));
			}
		}else{
			$temp['terms'] = [];
			if(has_term()){
				$_1st_category = get_the_term()[0];
				$temp['categories']         = get_the_term();
				$temp['_1st_category_id']   = $_1st_term->term_id;
				$temp['_1st_category_name'] = esc_html($_1st_term->name);
				$temp['_1st_category_url']  = esc_url(get_term_link($_1st_term->term_id));
			}
			
			
		}
		
		
		
		return apply_filters( $post_type.'_loop_data', $temp,  $ID);
		
	}
}


