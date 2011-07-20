<?php
/*
		Plugin Name: Picuous Shortcode
		Plugin URI: 
		Description: Plugin to allow the embedding of Picuous shortcodes
		Author: Picuous
		Version: 0.1
		Author URI: http://picuous.com
*/

function picuous_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'width' => '500',
		'height' => '364',
		'id' => '',
	), $atts ) );
	
	$check = strstr($id,'+');
	
	if($check == FALSE){
		$source_id = $id;
		$referrer = 'undefined';
	}else{	
		$source_data = explode('+',$id);
		$source_id = $source_data[0];
		$referrer = $source_data[1];
	}
	
	return "<iframe src='http://w.picuous.com/{$source_id}?r={$referrer}' scrolling='no' frameborder='0' onload='src+=\"#\"+document.location' width='{$width}' height='{$height}' style='border:none;overflow:hidden'></iframe>";
}

add_shortcode( 'picuous', 'picuous_shortcode' );

?>