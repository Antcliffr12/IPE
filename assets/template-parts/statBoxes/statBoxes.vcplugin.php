<?php
/**
 * Testimonials
 */

// Register shortcode
function sc_statBoxes( $atts, $content = '' ) {

	extract( shortcode_atts( array(
		'title' => '',
		'intro' => '',
		'columns' => 3,

	), $atts ));


	return render_component('statBoxes', [
		'columns' => $columns,
		'title' => $title,
		'intro' => $intro,
		'content' => do_shortcode($content),
	]);

}
add_shortcode( 'statBoxes', 'sc_statBoxes' );

// Register shortcode class
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_statBoxes extends WPBakeryShortCodesContainer {}
}

// Register Visual Composer plugin
if( function_exists('vc_map')) {
	vc_map(array(
		'name' => __('Stat Boxes', ''),
		'base' => 'statBoxes',
		'as_parent' => array('only' => 'statBoxes_item'),
		'content_element' => true,
		'icon' => THEME_PATH . '/assets/images/icons/tally.svg',
		'description' => __('Stat Info', ''),
		'category' => __('IPE Components', ''),
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
