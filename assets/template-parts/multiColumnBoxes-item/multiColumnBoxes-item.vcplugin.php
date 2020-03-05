<?php
/**
 * Testimonials
 */

// Register shortcode
function sc_multiColumnBoxes_item( $atts, $content = '' ) {

	extract( shortcode_atts( array(
		'title' => 'Title Goes Here',
		'title_link' => '',
		'buttons' => '',


	), $atts ));

	$buttons = iusm_get_valid_items($buttons, 'button_link');


	return render_component('multiColumnBoxes-item', [
		'title' => $title,
		'title_link' => $title_link,
		'intro' => $content,
		'buttons' => $buttons,


	]);

}
add_shortcode( 'multiColumnBoxes_item', 'sc_multiColumnBoxes_item' );

// Register shortcode class
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_multiColumnBoxes_item extends WPBakeryShortCode {}
}

// Register Visual Composer plugin
if( function_exists('vc_map')) {
	vc_map(array(
		'name' => __('Multi Column Boxes', ''),
		'base' => 'multiColumnBoxes_item',
		'as_child' => array('only' => 'multiColumnBoxes'),
		'content_element' => true,
		'icon' => THEME_PATH . '/assets/images/icons/call-to-action.png',
		'description' => __('Image with linked title and intro text', ''),
		'category' => __('Content Grid Items', ''),
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

			array_merge($vc_shared_params_iu_buttons_group, [
			'group' => '',
			]),



		)
	));
}
