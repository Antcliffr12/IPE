<?php
define('THEME_PATH', get_stylesheet_directory_uri());

// Loop through and process base theme includes
foreach( glob(TEMPLATEPATH .'/theme/*/*.php') as $filename){
	include_once $filename ;
}

//testing rendering
/**
 * Render method for lightweight UI components
 *
 * @param $component_name - The folder name of the component
 * @param array $context - A set of context variables to expose to the component's template
 * @return string - The rendered component markup
 */
function render_component($component_name, $params = array())
{
	$context = get_queried_object();
	try{
		if(!isset($component_name))
		{
			throw new \Exception("Component not specified!");
		}
		$name_parts = explode(':', $component_name);
		$component_name = array_shift($name_parts);
		$variant_name = (count($name_parts) > 0) ? '.'.array_shift($name_parts) : '';
		$component_file = TEMPLATEPATH . '/assets/template-parts/'.$component_name.'/' . $component_name . $variant_name . '.view.php';

		if(isset($params['mock'])){
			$component_file = TEMPLATEPATH .'/assets/template-parts/'.$component_name.'/' . $component_name . 'view.mock.' . $params['mock'] . '.php';
		}

		if(!file_exists($component_file)){
			throw new \Exception("Component{$component_name} not found at '{$component_file}'");
		}

		extract($params, EXTR_SKIP);
		ob_start();
		include $component_file;
		return ob_get_clean();
	} catch(Exception $ex){
		return $ex->getMessage();
	}
}


function iusm_get_valid_items($serialized_items, $filter_field) {
	$items = array();
	if ($serialized_items != '') {
		$unprocessed = vc_param_group_parse_atts($serialized_items);
		foreach($unprocessed as $row) {
			if (!empty($row[$filter_field])) {
				$items[] = $row;
			}
		}
	}
	return $items;
}

// Loop through and process base theme includes
foreach( glob(TEMPLATEPATH .'/theme/*/*.php') as $filename){
	include_once $filename ;
}
// Include all shortcodes/Visual Composer additions provided by components
foreach( glob(TEMPLATEPATH .'/assets/template-parts/*/*.vcplugin.php') as $filename){
	require_once $filename;
}


// REMOVE VC SHORTCODES LIST
$vc_remove_shortcode_list = [
	'sc_heroArea',
	'vc_btn',
	'vc_cta',
	'vc_custom_heading',
	'vc_empty_space',
	'vc_flickr',
	'vc_gallery',
	'vc_icon',
	'vc_images_carousel',
	'vc_line_chart',
	'vc_message',
	'vc_pie',
	'vc_posts_slider',
	'vc_progress_bar',
	'vc_round_chart',
	'vc_separator',
	'vc_text_separator',
	'vc_basic_grid',
	'vc_masonry_grid',
	'vc_masonry_media_grid',
	'vc_media_grid',
	'vc_facebook',
    'vc_googleplus',
	'vc_pinterest',
	'vc_tweetmeme',
	'vc_raw_html',
	'vc_raw_js',
	'vc_widget_sidebar',
	'vc_tabs',
	'vc_tour',
	'vc_accordion',
	'vc_tta_pageable',
	'vc_tta_tabs',
	'vc_tta_tour',
	'vc_message_box',
];
if( function_exists('vc_remove_element')) {
	foreach ($vc_remove_shortcode_list as $shortCode) {
		vc_remove_element($shortCode);
	}
}



function top_nav_wrap(){
	$wrap  = '<ul id="%1$s" class="%2$s">';

	// get nav items as configured in /wp-admin/
	$wrap .= '%3$s';
	
	$wrap .= '<li class="search-li menu-item"><a href="#"><i class="far fa-search"></i></a></li>';
	 
	
	
	// close the <ul>
	$wrap .= '</ul>';

	return $wrap;

}



function bottom_nav_wrap() {
	// default value of 'items_wrap' is <ul id="%1$s" class="%2$s">%3$s</ul>'
	
	// open the <ul>, set 'menu_class' and 'menu_id' values
	$wrap  = '<ul id="%1$s" class="%2$s">';
	

	$wrap .= '<li class="mobile_search">
	<div class="mobile_search_wrap">
	<input type="text" class="mobileSearch" placeholder="Search">
      <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
	</div>
	</li>';
	// the static link 
	$wrap .= '<li id="home_icon" class="active menu-item-type-custom menu-item-object-custom menu-item-59 Navbar__Link Navbar__mobile"><a href="/" title="home"><i class="far fa-home"></i></a></li>';


	// get nav items as configured in /wp-admin/
	$wrap .= '%3$s';
	
	// close the <ul>
	$wrap .= '</ul>';
	// return the result
	return $wrap;
  }


  //active class 
  add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

	function special_nav_class ($classes, $item) {
		if (in_array('current-menu-item', $classes) ){
			$classes[] = 'active ';
		}
		return $classes;
	}


	add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_page', '__return_false', 10);


//page counter 

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);



