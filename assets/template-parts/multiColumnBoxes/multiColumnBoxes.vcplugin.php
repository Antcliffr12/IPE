<?php
/**
 * Testimonials
 */

// Register shortcode
function sc_multiColumnBoxes( $atts, $content = '' ) {

	extract( shortcode_atts( array(
		'title' => '',
		'intro' => '',
		'columns' => 3,

	), $atts ));


	return render_component('multiColumnBoxes', [
		'columns' => $columns,
		'title' => $title,
		'intro' => $intro,
		'content' => do_shortcode($content),
	]);

}
add_shortcode( 'multiColumnBoxes', 'sc_multiColumnBoxes' );

// Register shortcode class
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_multiColumnBoxes extends WPBakeryShortCodesContainer {}
}

// Register Visual Composer plugin
if( function_exists('vc_map')) {
	vc_map(array(
		'name' => __('Multi Columns', ''),
		'base' => 'multiColumnBoxes',
		'as_parent' => array('only' => 'multiColumnBoxes_item'),
		'content_element' => true,
		'icon' => 'icon-wpb-application-icon-large',
		'description' => __('Multi Column Boxes', ''),
		'category' => __('IUSM New Components', ''),
		'js_view' => 'VcColumnView',
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => __( 'Grid Layout', '' ),
				'param_name' => 'columns',
				'value' => array(
					__('1 Column') => 1,
					__('2 Columns') => 2,
        	__('3 Columns') => 3,
				),
				'description' => __( 'Select the number of columns this grid will use at the largest screen size.' ),
				'std' => 3,
			),

		),
	));
}
