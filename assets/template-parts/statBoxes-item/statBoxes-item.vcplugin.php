<?php
/**
 * Testimonials
 */

// Register shortcode
function sc_statBoxes_item( $atts, $content = '' ) {

	extract( shortcode_atts( array(
		'title' => 'Title Goes Here',
		'title_link' => '',


	), $atts ));



	return render_component('statBoxes-item', [
		'title' => $title,
		'title_link' => $title_link,
		'intro' => $content,


	]);

}
add_shortcode( 'statBoxes_item', 'sc_statBoxes_item' );

// Register shortcode class
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_statBoxes_item extends WPBakeryShortCode {}
}

// Register Visual Composer plugin
if( function_exists('vc_map')) {
	vc_map(array(
		'name' => __('Stat Boxes', ''),
		'base' => 'statBoxes_item',
		'as_child' => array('only' => 'statBoxes'),
		'content_element' => true,
		'icon' => THEME_PATH . '/assets/images/icons/tally.svg',
		'description' => __('Image with linked title and intro text', ''),
		'category' => __('IPE Components', ''),
		'params' => array(

			array(
				"type" => "textfield",
				"heading" => __("Title", ""),
				"param_name" => "title",
				'admin_label' => true,
				"value" => "",
				"description" => __("Title text for the grid item", "")
			),


			array(
				"type" => "textarea_html",
				"heading" => __("Intro Text", ""),
				"param_name" => "content",
				"value" => "",
				"description" => __("Enter the intro text here", "")
			),





		)
	));
}
