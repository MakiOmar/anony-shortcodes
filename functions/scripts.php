<?php

if ( !defined('ABSPATH') ) exit();

function anoshc_styles(){
		
	$styles = array(
		'owl-menu' => 'owl-menu',
		'posts-grid' => 'posts-grid',
		'rhombus-images-grid' => 'rhombus-images-grid',
		'fontawesome5' => 'all',
	);
		
	$styles_libs = [
		'circle' => 'circle',
		'slick' => 'slick',
		'slick-vtext' => 'slick-vtext-slider',
		'heapshot' => 'heapshot',
		'owl.carousel' => 'owl.carousel.min',
		'flickity' => 'flickity.min',
	];
	
	$styles = array_merge($styles, $styles_libs);
	
	foreach($styles as $style => $file_name){
		
		$handle = in_array($style, array_keys($styles_libs)) ? $style : 'anoshc_' . $style;
		
		wp_enqueue_style( 
			$handle, 
			ANOSHC_URI . 'assets/css/'.$file_name.'.css', 
			false,
			filemtime(
				wp_normalize_path(ANOSHC_DIR . 'assets/css/'.$file_name.'.css' )
			) 
		);
	}

}

function anoshc_scripts(){	
	$scripts = array(
		'slick-vtext-slider' => 'slick-vtext',
		'headpshot-init' => 'headpshot-init',
		'rhombus-images-grid' => 'rhombus-images-grid',
	);
	
	$libs_scripts = [
		'circle' => 'circle',
		'slick' => 'slick.min',
		'heapshot' => 'jquery.heapshot',
		'imagesloaded' => 'jquery.imagesloaded.min',
		'jQueryRotate' => 'jQueryRotate.min',
		'owl.carousel' => 'owl.carousel.min',
		'flickity' => 'flickity.pkgd.min'
	];
	
	$scripts = array_merge($libs_scripts, $scripts);
	
	foreach($scripts as $script => $file_name){
		
		$handle = in_array($script, $libs_scripts) ? $script : 'anoshc_' . $script;
		
		wp_register_script( 
			$handle , 
			ANOSHC_URI . 'assets/js/'.$file_name.'.js' ,
			['jquery'],
			filemtime(
				wp_normalize_path(ANOSHC_DIR . 'assets/js/'.$file_name.'.js' )
			), 
			true 
		);
	}
	
	wp_enqueue_script( 'jquery' );
}

//Theme Scripts
add_action('wp_enqueue_scripts',function() {
		
	anoshc_styles();
	anoshc_scripts();

});