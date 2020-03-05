<?php 

//header logo
function mytheme_customize_register($wp_customize){

	$wp_customize->add_setting('your_theme_logo');

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'your_theme_logo',
	array(
		'label' => 'Upload Logo',
		'section' => 'title_tagline',
		'settings' => 'your_theme_logo',
    )));
    
        $wp_customize->add_section( 'sample_custom_controls_section' , array(
            'title'    => __( 'Leadership', 'starter' ),
            'priority' => 30
        ) );   

      $wp_customize->add_setting( 'sample_custom_control',
            array(
                'default' => '',
                'transport' => 'refresh',
            )
        );

        $wp_customize->add_control( new WP_Customize_Latest_Post_Control( $wp_customize, 'sample_custom_control',
            array(
                'label' => __( 'Sample Custom Control' ),
                'description'  => esc_html__( 'This is the Custom Control description.' ),
                'section' => 'sample_custom_controls_section'
            )
        ) );


 
	
}
add_action('customize_register', 'mytheme_customize_register');




if( class_exists( 'WP_Customize_Control' ) ):
	class WP_Customize_Latest_Post_Control extends WP_Customize_Control {
        public $type = 'sample_custom_control';

        public function enqueue(){
            // 1. customizer-preview.js
            function tuts_customize_preview_js() {
                wp_enqueue_script( 'tuts_customizer_preview', get_template_directory_uri() . '/theme/actions/customizer.js', array( 'customize-preview' ), null, true );
                // wp_enqueue_style('tuts_customizer_preview', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
                wp_enqueue_script( 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js');

            }
            add_action( 'customize_controls_print_scripts', 'tuts_customize_preview_js' );
            

            // 1. customizer-preview.js
            function tuts_customize_preview_css() {
                wp_enqueue_style('tuts_customizer_preview', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
                wp_enqueue_style('tuts_customizer_test', get_stylesheet_directory_uri() . '/assets/styles/site.css');

            }
            add_action( 'customize_controls_print_styles', 'tuts_customize_preview_css' );
        }
 
		public function render_content() {

		$latest = new WP_Query( array(
			'post_type'   => 'Leadership',
			'post_status' => 'publish',
			'orderby'     => 'date',
			'order'       => 'DESC'
		));

		?>
			<ul id="sortable">
			<?php 
			    while( $latest->have_posts() ) {
				    $latest->the_post();
					echo "<li class='ui-state-default ui-sortable-handle'>" . the_title( '', '', false ) . "</li>";
			   }
			?>
				
			</ul>
		<?php
		}
	}
endif;


