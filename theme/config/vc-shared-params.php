<?php
$vc_shared_params_iu_text_group = array(
	'type' => 'param_group',
	'value' => '',
	'heading' => __( 'Sliders (optional)' ),
	'param_name' => 'slider',
	'description' => __( 'Add multiple buttons below content' ),
	'group' => 'Content',
	'params' => array(
		array(
			'type' => 'file_picker',
			'value' => '',
			'heading' => 'Select File',
			'param_name' => 'image',
			'description' => __('Select image from media library.'),
		  ),
		array(
			'type' => 'textfield',
			'heading' => __( 'Heading' ),
			'param_name' => 'content_heading',
			'value' => '',
			'group' => 'Content',
			'description' => __( 'Provide a Heading' )
		),

		array(
			'type' => 'textarea',
			'heading' => __( 'content_text' ),
			'param_name' => 'content_text',
			'value' => '',
			'group' => 'Content',
			'description' => __( 'Text under heading in slides' )
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Button Text' ),
			'param_name' => 'button_text',
			'value' => '',
			'group' => 'Content',
			'description' => __( 'Provide the button label text' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Button Link' ),
			'param_name' => 'button_link',
			'value' => '',
			'group' => 'Content',
			'description' => __( 'Provide the button link URL' )
		),
	),

	
);


$vc_shared_params_iu_buttons_group = array(
	'type' => 'param_group',
	'value' => '',
	'heading' => __( 'Buttons (optional)' ),
	'param_name' => 'buttons',
	'description' => __( 'Add multiple buttons below content' ),
	'group' => 'Content',
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Button Text' ),
			'param_name' => 'button_text',
			'value' => '',
			'group' => 'Content',
			'description' => __( 'Provide the button label text' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Button Link' ),
			'param_name' => 'button_link',
			'value' => '',
			'group' => 'Content',
			'description' => __( 'Provide the button link URL' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Add IU Logo' ),
			'param_name' => 'iu_logo',
			'value' => array(
				'No' => '',
				'Yes' => 'add-logo',
			),
			'std' => '',
			'description' => __( 'Adds the IU Logo left of button text' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Link target' ),
			'param_name' => 'button_link_target',
			'value' => array(
				'Same window (default)' => '_self',
				'New window' => '_blank',
			),
			'std' => '_self',
			'description' => __( 'Set whether link opens in the same window/tab' )
		),
	),
);



function file_picker_settings_field( $settings, $value ) {
	$output = '';
	$select_file_class = '';
	$remove_file_class = ' hidden';
	$attachment_url = wp_get_attachment_url( $value );
	if ( $attachment_url ) {
	  $select_file_class = ' hidden';
	  $remove_file_class = '';
	}
	$output .= '<div class="file_picker_block">
				  <div class="' . esc_attr( $settings['type'] ) . '_display">' .
					$attachment_url .
				  '</div>
				  <input type="hidden" name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .
				   esc_attr( $settings['param_name'] ) . ' ' .
				   esc_attr( $settings['type'] ) . '_field" value="' . esc_attr( $value ) . '" />
				  <button class="button file-picker-button' . $select_file_class . '">Select File</button>
				  <button class="button file-remover-button' . $remove_file_class . '">Remove File</button>
				</div>
				';
	return $output;
  }
  vc_add_shortcode_param( 'file_picker', 'file_picker_settings_field', get_template_directory_uri() . '/assets/scripts/file_picker.js' );


  function get_extension($file, $image_url, $content_heading, $content_text, $button_text, $button_link, $id) {
		$tmp = explode('.', $file);
		$file_extension = end($tmp);
		if($file_extension == 'jpg' || $file_extension == 'png'){
			if($id == 0 || $id == 1 || $id == 2){
				?>
				<div class="box-container box-<?= $id ?>">
					<div class="back-image" style="background: url('<?= $image_url; ?>') no-repeat center center; -webkit-background-size: cover;
	-moz-background-size: cover; -o-background-size: cover; background-size: cover; ">					
					</div>
					<div class="caption-<?= $id; ?> slider-caption  animated bounceInLeft delay-1s slow">
						<div class="h1"><?= $content_heading ?> </div>
						<p><?= $content_text ?></p>           

						<div class="btn-wrap">
							<div class="button">
							<a href="<?= $button_link ?>">
								<?= $button_text ?>
							</a>
							</div> 
						</div>                

					</div>
				

				</div><!-- box container -->
				<?php 			
			}
			
		} elseif ($file_extension == 'mp4' || $file_extension == 'webm'){
			if($id == 0 || $id == 1 || $id == 2){
				?>
					<div class="box-container box-<?= $id ?>">
					<video playsinline autoplay muted loop preload="preload" id="bgvideo" class="d-block w-100" width="1800" height="640">
                    	<source src="<?= $image_url ?>" type="video/mp4">
                    </video>			
					<div class="caption-<?= $id; ?> slider-caption">
						<div class="h1"><?= $content_heading ?> </div>
						<p><?= $content_text ?></p>           

						<div class="btn-wrap">
							<a href="<?= $button_link ?>" class="button">
								
								<?= $button_text ?>
							</a> 
						</div>                

					</div>

				</div><!-- box container -->
				<?php 
			}
		}else{
			return; 
		}
		return $file_extension ? $file_extension : false;
   }