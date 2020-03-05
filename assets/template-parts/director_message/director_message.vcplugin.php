<?php

function sc_director_message($atts, $content = ''){

  	extract( shortcode_atts( array(
      'image' => false,
          'image_url' => 'http://placehold.it/1800x600',
      'title' => '',
    ), $atts ));

    if ($image) {
      $img_id = preg_replace( '/[^\d]/', '', $image );
      $data = wp_get_attachment_image_src( $img_id, 'full');
      $image_url = $data[0];
    }

    return render_component('director_message', [
      'title' => $title,
      'image_url' => $image_url,
      'body' => $content,
    ]);
}

add_shortcode('director_message', 'sc_director_message');

if(function_exists('vc_map')) {
  vc_map(array(
    'name' => __('Director Message'),
    'base' => 'director_message',
    'icon' => THEME_PATH . '/assets/images/icons/sticky-note.svg',
    'description' => __('Directors Message'),
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
      array(
        'type' => 'textarea_html',
        'holder' => 'div',
        'heading' => __('Text', ''),
        'param_name' => 'content',
        'value' => '',
        'description' => __('Enter content here.')
      ),

    )


  ));
}
