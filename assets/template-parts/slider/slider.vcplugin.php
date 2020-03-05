<?php

function sc_slider($atts, $content = ''){

  	extract( shortcode_atts( array(
      'image' => false,
          'image_url' => 'http://placehold.it/360x240',
      'title' => '',
      'slider' => '',
    ), $atts ));

    $slider = iusm_get_valid_items($slider, 'content_text');


    if ($image) {
      $img_id = preg_replace( '/[^\d]/', '', $image );
      $data = wp_get_attachment_image_src( $img_id, 'iu-medium');
      $image_url = $data[0];
    }

    return render_component('slider', [
      'title' => $title,
      'image_url' => $image_url,
      'body' => $content,
      'slider' => $slider,
    ]);
}

add_shortcode('slider', 'sc_slider');

if(function_exists('vc_map')) {
  vc_map(array(
    'name' => __('Slider'),
    'base' => 'slider',
    'icon' => THEME_PATH . '/assets/images/icons/sliders-h-square.svg',
    'description' => __('Slider for Home Page.'),
    'category' => __('IPE Components'),
    'params' => array(
      array(
        'type' => 'attach_image',
        'value' => '',
        'heading' => 'Image',
        'param_name' => 'image',
        'description' => __('Select image from media library.'),
      ),
      array(
        'type' => 'textfield',
        'holder' => 'h1',
        'heading' => __('Title'),
        'param_name' => 'title',
        'value' => '',
        'description' => __('Enter a title here'),
      ),
  
      array_merge($vc_shared_params_iu_text_group, [
          'group' => '',
        ]),


    )


  ));
}
