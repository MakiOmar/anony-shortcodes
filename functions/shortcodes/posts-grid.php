<?php if ( !defined('ABSPATH') ) exit();

if(!function_exists('anoshc_posts_grid')){
	
	function anoshc_posts_grid( $atts ){
		
		$atts = shortcode_atts( array(
		'style' => '2',
		'col' => 3,
		'posts_per_page' => 6,
		'post_type' => 'post',
		'socials_style' => 'official'
		), $atts );
		
		
		
		extract($atts);
		
		$query = new WP_Query(
			[
				//NO. of posts you want to show 
				'posts_per_page' => $posts_per_page,
				'post_type' => $post_type,
	 
			]
		);

		$data = [];
		
		if ($query->have_posts()) {
	
			while($query->have_posts()) {
				$query->the_post();
				
				$temp = anoshc_common_post_data();
				
				$temp['thumbnail_img'] = get_the_post_thumbnail_url(get_the_ID(), 'posts-grid-one');
								
				$data[] = $temp;
				
			}
			
			wp_reset_postdata();
		}
		
		if (empty($data)){
	
	
			return esc_html__( 'No posts found' );
			
			
		}
		
		wp_enqueue_script('anoshc_slick');		
		
		
		add_action( 'wp_footer',function(){?>
			
			<script type="text/javascript">
				
				jQuery(document).ready(function($){
					
					$('.excerpt-toggle').on('click', function(){
						
						$(this).parents('.post-grid-item').find('.excerpt').each(function(){
							
							if($(this).hasClass('show-excerpt')){
								$(this).removeClass('show-excerpt');
								
							}else{
								$(this).addClass('show-excerpt');
							}
						});
						
					});
					
					$('.model-toggle').on('click', function(){
						
						$(this).next('.share').each(function(){
							
							if($(this).hasClass('show-share')){
								$(this).removeClass('show-share');
								
							}else{
								$(this).addClass('show-share');
							}
						});
						
					});
					
					$('.anoshc-posts-grid').slick({
					  autoplay: true,
					  autoplaySpeed: 3000,
					  speed: 300,
					  arrows: false,
					  mobileFirst: true
					});
					
				});
				
			</script>
			
		<?php } );
		
		ob_start();
		include ANOSHC_TMPLS . '/posts-grids/posts-grid-'.$style.'.php';
		return ob_get_clean();
	}
}

add_shortcode( 'anoshc-posts-grid', 'anoshc_posts_grid' );