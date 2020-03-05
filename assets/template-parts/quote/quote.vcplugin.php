<?php

function sc_quote($atts, $content = ''){

  	extract( shortcode_atts( array(
      'image' => false,
          'image_url' => 'http://placehold.it/360x240',
      'title' => '',
      'name' => '',
      'position' => ''

    ), $atts ));

    if ($image) {
      $img_id = preg_replace( '/[^\d]/', '', $image );
      $data = wp_get_attachment_image_src( $img_id, 'iu-medium');
      $image_url = $data[0];
    }

    return render_component('quote', [
      'title' => $title,
      'name' => $name,
      'position' => $position,
      'image_url' => $image_url,
      'body' => $content,
    ]);
}

add_shortcode('quote', 'sc_quote');

if(function_exists('vc_map')) {
  vc_map(array(
    'name' => __('Quote'),
    'base' => 'quote',
    'icon' => THEME_PATH . '/assets/images/icons/quote-right.svg',
    'description' => __('Quote with left image.'),
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
        'holder' => 'h2',
        'heading' => __('Title'),
        'param_name' => 'title',
        'value' => '',
        'description' => __('Enter title'),
      ),

      array(
        'type' => 'textarea_html',
        'holder' => 'div',
        'heading' => __('Text', ''),
        'param_name' => 'content',
        'value' => '',
        'description' => __('Enter content here.')
      ),
      array(
        'type' => 'textfield',
        'holder' => 'p',
        'heading' => __('Name'),
        'param_name' => 'name',
        'value' => '',
        'description' => __('Enter name and Position'),
      ),
      array(
        'type' => 'textfield',
        'holder' => 'p',
        'heading' => __('Position'),
        'param_name' => 'position',
        'value' => '',
        'description' => __('Enter name and Position'),
      ),

    )


  ));
}
