<?php

if ( !defined('ABSPATH') ) exit();

function anoshc_styles(){
		
	$styles = array('owl-menu' => 'owl-menu');
		
	$styles_libs = [
		'circle' => 'circle',
		'owl.carousel' => 'owl.carousel.min',
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
	$scripts = array();
	
	$libs_scripts = [
		'circle' => 'circle',
		'owl.carousel' => 'owl.carousel.min'
	];
	
	$scripts = array_merge($scripts, $libs_scripts);
	
	foreach($scripts as $script => $file_name){
		
		$handle = in_array($script, $libs_scripts) ? $script : 'anoshc_' . $script;
		
		wp_enqueue_script( 
			$handle , 
			ANOSHC_URI . 'assets/js/'.$file_name.'.js' ,
			['jquery'],
			filemtime(
				wp_normalize_path(ANOSHC_DIR . 'assets/js/'.$file_name.'.js' )
			), 
			true 
		);
	}
}

//Theme Scripts
add_action('wp_enqueue_scripts',function() {
		
	anoshc_styles();
	anoshc_scripts();

});